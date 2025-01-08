<?php

namespace App\Repositories\Field;
use App\Models\Culture\Culture;
use App\Models\Field\Consumption\Consumption;
use App\Models\Field\Field as Model;
use App\Models\Field\Income\Income;
use App\Models\Field\ProductQuantity\ProductQuantity;
use App\Repositories\CoreRepository;

class FieldRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function reportsByField($fieldId)
    {
        $fieldMain = $this->getForReport($fieldId, 1);
        $fieldSide = $this->getForReport($fieldId, 2);

        if ($fieldMain && $fieldSide) {
            $this->mainFieldReport($fieldMain);
            $this->sideFieldReport($fieldSide);
            $fieldMain->side_production = $fieldSide->side_production;

            unset(
                $fieldMain->incomes_sum_quantity,
                $fieldMain->consumptions_sum_quantity,
                $fieldMain->product_quantities_sum_quantity,
                $fieldMain->incomes,
                $fieldMain->consumptions,
                $fieldMain->productQuantities
            );

            return $fieldMain;
        }
        return null;
    }

    public function sideFieldReport(object $field)
    {
        $sideProductions = [];
        $cultureIds = collect([
            $field->incomes->pluck('culture_id'),
            $field->consumptions->pluck('culture_id'),
            $field->productQuantities->pluck('culture_id')
        ])->flatten()->unique()->toArray();

        $cultures = Culture::whereIn('id', $cultureIds)->get();

        foreach ($cultures as $culture) {
            $cultureId = $culture->id;

            $totalProductQuantity = $field->productQuantities->firstWhere('culture_id', $cultureId)->total_quantity ?? 0;
            $incomes = $field->incomes->firstWhere('culture_id', $cultureId)->total_quantity ?? 0;
            $consumptions = $field->consumptions->firstWhere('culture_id', $cultureId)->total_quantity ?? 0;
            $costPrice = $field->cost_price ?? null;

            $sideProductions[] = (object) [
                'culture' => $culture,
                'incomes_sum_quantity' => $incomes,
                'consumptions_sum_quantity' => $consumptions,
                'product_quantities_sum_quantity' => $totalProductQuantity,
                'cost_price' => $totalProductQuantity > 0 ? round(($incomes + $consumptions) / ($totalProductQuantity * 1000), 3) : null,
                'profit' => round($incomes - $consumptions, 3),
                'remaining_product_cost' => $totalProductQuantity > 0 && $costPrice !== null
                    ? round(($totalProductQuantity - $incomes - $consumptions - $totalProductQuantity) * $costPrice, 3)
                    : null,
                'product_loss_cost' => $costPrice,
                'profitability' => $incomes > 0 && $costPrice !== null
                    ? round(($incomes - ($costPrice * $incomes)) / ($costPrice * $incomes) * 100, 3)
                    : null,
            ];
        }

        $field->side_production = $sideProductions;
    }


    public function mainFieldReport(object $field)
    {
        $totalProductQuantity = $field->productQuantities->sum('total_quantity') ?? 0;
        $incomes = $field->incomes->sum('total_quantity') ?? 0;
        $consumptions = $field->consumptions->sum('total_quantity') ?? 0;
        $costPrice = $field->cost_price;

        $field->main_production = (object) [
            'incomes_sum_quantity' => $incomes,
            'consumptions_sum_quantity' => $consumptions,
            'product_quantities_sum_quantity' => $totalProductQuantity,
            'yield' => $field->area > 0 ? round($totalProductQuantity / $field->area, 3) : null,
            'cost_price' => $totalProductQuantity > 0 ? round(($incomes + $consumptions) / ($totalProductQuantity * 1000), 3) : null,
            'profit' => $totalProductQuantity > 0 && $costPrice !== null
                ? round(($totalProductQuantity * $costPrice) + $incomes - $consumptions, 3)
                : null,
            'remaining_product_cost' => $totalProductQuantity > 0 && $costPrice !== null
                ? round(($totalProductQuantity - $incomes - $consumptions - $totalProductQuantity) * $costPrice, 3)
                : null,
            'product_loss_cost' => $totalProductQuantity > 0 && $costPrice !== null
                ? round($totalProductQuantity * $costPrice, 3)
                : null,
            'profitability' => $incomes > 0 && $costPrice !== null
                ? round(($incomes - ($costPrice * $incomes)) / ($costPrice * $incomes) * 100, 3)
                : null,
        ];
    }

    public function getForReport($fieldId, $productTypeId)
    {
        $incomes = Income::selectRaw('culture_id, SUM(quantity) as total_quantity')
            ->where('product_type_id', $productTypeId)
            ->groupBy('culture_id')
            ->get();
        $consumptions = Consumption::selectRaw('culture_id, SUM(quantity) as total_quantity')
            ->where('product_type_id', $productTypeId)
            ->groupBy('culture_id')
            ->get();
        $productQuantities = ProductQuantity::selectRaw('culture_id, SUM(quantity) as total_quantity')
            ->groupBy('culture_id')
            ->where('product_type_id', $productTypeId)
            ->get();
        $field = $this->startConditions()
            ->select('id', 'culture_id', 'area')
            ->where('user_id', $this->user->id)
            ->with('culture:id,title_ru,title_tj,title_uz')
            ->findOrFail($fieldId);
        $field->incomes = $incomes;
        $field->consumptions = $consumptions;
        $field->productQuantities = $productQuantities;
        return $field;
    }


    public function getByFrontId($front_key)
    {
        return $this->startConditions()
            ->where('front_key', $front_key)
            ->with('culture', 'prevCulture', 'irrigation')
            ->first();
    }
    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()
            ->orderBy('title', 'asc')
            ->with('culture', 'prevCulture', 'irrigation')
            ->paginate($quantity);
    }

    public function getByUserIdPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->orderBy('title', 'asc')
            ->with('culture', 'prevCulture', 'irrigation')
            ->paginate($quantity);
    }

    public function getAllMine($user_id)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->with('culture', 'prevCulture', 'irrigation')
            ->get();
    }

    public function getAllMineWithPaginate($user_id, $quantity)
    {
        return $this->startConditions()
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->with('culture', 'prevCulture', 'irrigation')
            ->paginate($quantity);
    }

    public function getOnlyMineWithChildrenOrFail($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->where('user_id', '=', $this->user->id)
            ->orderBy('id', 'desc')
            ->with('culture', 'prevCulture', 'irrigation')
            ->firstOrFail();
    }
    public function search($value)
    {
        return $this->startConditions()->where('title', 'like', "%$value%")
            ->with('culture', 'prevCulture')->get();
    }

    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()
            ->with('culture', 'prevCulture', 'irrigation')
            ->findOrFail($id);
    }



    public function update($id, $data)
    {
        $record = $this->getEditOrFail($id);
        $record->update($data);
        return $record;
    }

    public function create($data)
    {
        return $this->startConditions()->create($data);
    }

    public function delete($id)
    {
        $record = $this->getEditOrFail($id);
        return $record->delete();
    }

    public function deleteIfMine($id, $user_id)
    {
        $record = $this->getEditOrFail($id);
        if ($record->user_id == $user_id){
            return $record->delete();
        }
        return false;
    }

}

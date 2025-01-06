<?php

namespace App\Repositories\Field;
use App\Models\Field\Field as Model;
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

        $this->mainFieldReport($fieldMain);
        $this->sideFieldReport($fieldSide);
        $fieldMain->side_production = $fieldSide->side_production;

        unset(
            $fieldMain->incomes_sum_quantity,
            $fieldMain->consumptions_sum_quantity,
            $fieldMain->product_quantities_sum_quantity
        );

        return $fieldMain;
    }

    public function sideFieldReport(object $field)
    {
        $totalProductQuantity = $field->product_quantities_sum_quantity;
        $incomes = $field->incomes_sum_quantity;
        $consumptions = $field->consumptions_sum_quantity;
        $costPrice = $field->cost_price;

        $field->side_production = (object) [
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

    public function mainFieldReport(object $field)
    {
        $totalProductQuantity = $field->product_quantities_sum_quantity;
        $incomes = $field->incomes_sum_quantity;
        $consumptions = $field->consumptions_sum_quantity;
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
        return $this->startConditions()
            ->select('id', 'culture_id', 'area')
            ->where('id', $fieldId)
            ->with('culture:id,title_ru,title_tj,title_uz')
            ->withSum(['incomes'            => fn($query) => $query->where('product_type_id', $productTypeId)], 'quantity')
            ->withSum(['consumptions'       => fn($query) => $query->where('product_type_id', $productTypeId)], 'quantity')
            ->withSum(['productQuantities'  => fn($query) => $query->where('product_type_id', $productTypeId)], 'quantity')
            ->first();
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

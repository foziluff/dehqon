<?php

namespace App\Http\Controllers\Admin\Field\Income;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Field\Income\StoreIncomeRequest;
use App\Http\Requests\Admin\Field\Income\UpdateIncomeRequest;
use App\Repositories\Culture\CultureRepository;
use App\Repositories\Field\FieldRepository;
use App\Repositories\Field\Income\IncomeRepository;
use App\Repositories\Field\ProductTypeRepository;

class IncomeController extends Controller
{
    private $incomeRepository;
    private $productTypeRepository;
    private $fieldRepository;
    private $cultureRepository;

    public function __construct()
    {
        parent::__construct();
        $this->incomeRepository = app(IncomeRepository::class);
        $this->productTypeRepository = app(ProductTypeRepository::class);
        $this->fieldRepository = app(FieldRepository::class);
        $this->cultureRepository = app(CultureRepository::class);
    }

    public function index()
    {
        $records = $this->incomeRepository->getAllWithPaginate(20);
        return view('admin.field.income.index', compact('records'));
    }

    public function create()
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        return view('admin.field.income.create', compact('fields', 'cultures', 'productTypes'));
    }

    public function store(StoreIncomeRequest $request)
    {
        $record = $this->user->incomes()->create($request->validated());
        return redirect()->route('incomes.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    public function show($id)
    {
        $record = $this->incomeRepository->getEditOrFail($id);
        return view('admin.field.income.show', compact('record'));
    }

    public function edit(int $id)
    {
        $fields = $this->fieldRepository->getAllMine($this->user->id);
        $cultures = $this->cultureRepository->getAll();
        $productTypes = $this->productTypeRepository->getAll();

        $record = $this->incomeRepository->getEditOrFail($id);
        return view('admin.field.income.edit', compact('record', 'productTypes', 'fields', 'cultures'));
    }

    public function update(UpdateIncomeRequest $request, int $id)
    {
        $this->incomeRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->incomeRepository->delete($id);
        return redirect()->route('incomes.index')->with(['success' => 'Успешно удалено!']);
    }
}

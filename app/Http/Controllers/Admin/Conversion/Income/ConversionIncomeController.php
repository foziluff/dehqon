<?php

namespace App\Http\Controllers\Admin\Conversion\Income;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Conversion\Income\StoreConversionIncomeRequest;
use App\Http\Requests\Admin\Conversion\Income\UpdateConversionIncomeRequest;
use App\Repositories\Conversion\ConversionRepository;
use App\Repositories\Conversion\Income\ConversionQuantityRepository;
use App\Repositories\Conversion\Consumption\ConversionNamingRepository;
use App\Repositories\Conversion\Consumption\ConversionTypeRepository;

class ConversionIncomeController extends Controller
{
    private $conversionIncomeRepository;
    private $conversionRepository;
    private $conversionNamingRepository;
    private $conversionTypeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->conversionIncomeRepository = app(ConversionQuantityRepository::class);
        $this->conversionRepository = app(ConversionRepository::class);
        $this->conversionNamingRepository = app(ConversionNamingRepository::class);
        $this->conversionTypeRepository = app(ConversionTypeRepository::class);
    }

    public function index()
    {
        $records = $this->conversionIncomeRepository->getAllWithPaginate(20);
        return view('admin.conversion.income.index', compact('records'));
    }

    public function create()
    {
        $conversions = $this->conversionRepository->getAllMine($this->user->id);
        $conversionNamings = $this->conversionNamingRepository->getAll();
        $conversionTypes = $this->conversionTypeRepository->getAll();

        return view('admin.conversion.income.create', compact('conversions', 'conversionNamings', 'conversionTypes'));
    }

    public function store(StoreConversionIncomeRequest $request)
    {
        $record = $this->user->conversionIncomes()->create($request->validated());
        return redirect()->route('conversionIncomes.edit', $record->id)->with(['success' => 'Успешно добавлено!']);
    }

    public function show($id)
    {
        $record = $this->conversionIncomeRepository->getEditOrFail($id);
        return view('admin.conversion.income.show', compact('record'));
    }

    public function edit(int $id)
    {
        $conversions = $this->conversionRepository->getAllMine($this->user->id);
        $conversionNamings = $this->conversionNamingRepository->getAll();
        $conversionTypes = $this->conversionTypeRepository->getAll();

        $record = $this->conversionIncomeRepository->getEditOrFail($id);
        return view('admin.conversion.income.edit', compact('conversions','record', 'conversionNamings', 'conversionTypes'));
    }

    public function update(UpdateConversionIncomeRequest $request, int $id)
    {
        $this->conversionIncomeRepository->update($id, $request->validated());
        return redirect()->back()->with(['success' => 'Успешно обновлено!']);
    }

    public function destroy(int $id)
    {
        $this->conversionIncomeRepository->delete($id);
        return redirect()->route('conversionIncomes.index')->with(['success' => 'Успешно удалено!']);
    }
}

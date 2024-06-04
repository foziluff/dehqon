<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Actions\ImageAction;
use App\Http\Controllers\Base\Controller;
use App\Http\Requests\Admin\Organization\StoreOrganizationRequest;
use App\Http\Requests\Admin\Organization\UpdateOrganizationRequest;
use App\Repositories\Organization\OrganizationRepository;

class OrganizationController extends Controller
{
    private $organizationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->organizationRepository = app(OrganizationRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->organizationRepository->getAllWithPaginate(20);
        return view('admin.organization.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->organizationRepository->create($request->all());
        return redirect()->route('organizations.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->organizationRepository->getEditOrFail($id);
        return view('admin.organization.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $record = $this->organizationRepository->getEditOrFail($id);
        return view('admin.organization.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        $this->organizationRepository->update($id, $request->all());
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->organizationRepository->delete($id);
        return redirect()->route('organizations.index')->with(['success' => 'Успешно удален!']);
    }
}

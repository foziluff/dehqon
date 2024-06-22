<?php

namespace App\Http\Controllers\Admin\Auth\Users;

use App\Actions\ImageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\StoreUsersRequest;
use App\Http\Requests\Admin\Users\UpdateUsersRequest;
use App\Repositories\Organization\OrganizationRepository;
use App\Repositories\Users\UsersRepository;

class UsersController extends Controller
{
    private $usersRepository;
    private $organizationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->organizationRepository = app(OrganizationRepository::class);
        $this->usersRepository = app(UsersRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = $this->usersRepository->getAllWithPaginate(20);
        return view('admin.users.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = $this->organizationRepository->getAll();
        return view('admin.users.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        $request = (new ImageAction())->handle($request);
        $record = $this->usersRepository->create($request->validated() + ['image_path' => $request->image_path]);
        return redirect()->route('users.edit', $record->id)->with(['success' => 'Успешно добавлен!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $record = $this->usersRepository->getEditOrFail($id);
        return view('admin.users.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $organizations = $this->organizationRepository->getAll();
        $record = $this->usersRepository->getEditOrFail($id);
        return view('admin.users.edit', compact('record', 'organizations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, int $id)
    {
        $request = (new ImageAction())->handle($request);
        if ($this->usersRepository->getPhoneCount($request->phone) > 0 &&
            $this->usersRepository->getEditOrFail($id)->phone != $request->phone)
        {
            return redirect()->back()->withErrors(['error' => 'Номер уже зарегистрирован!']);
        }
        $this->usersRepository->update($id, $request);
        return redirect()->back()->with(['success' => 'Успешно обновлен!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->usersRepository->delete($id);
        return redirect()->route('users.index')->with(['success' => 'Успешно удален!']);
    }
}

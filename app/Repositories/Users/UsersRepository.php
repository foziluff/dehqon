<?php

namespace App\Repositories\Users;
use App\Models\Auth\User as Model;
use App\Repositories\CoreRepository;

class UsersRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($quantity)
    {
        return $this->startConditions()->orderBy('name', 'asc')->toBase()->paginate($quantity);
    }

    public function search($value)
    {
        return $this->startConditions()->where('name', 'like', "%$value%")->toBase()->get();
    }

    public function getPhoneCount($phone)
    {
        return $this->startConditions()->where('phone', $phone)->count();
    }

    public function getAll()
    {
        return $this->startConditions()->all()->toBase();
    }

    public function getEditOrFail($id)
    {
        return $this->startConditions()->findOrFail($id);
    }


    public function update($id, $data)
    {
        $record = $this->getEditOrFail($id);
        $record->update($data->password ? $data->validated() + ['image_path' => $data->image_path] : $data->except('password'));

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

}

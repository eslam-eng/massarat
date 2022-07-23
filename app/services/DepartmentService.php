<?php

namespace App\services;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class DepartmentService
{
    public $model ;

    public function __construct(Department $model)
    {
        $this->model = $model ;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create($data=[])
    {
        $this->model->create($data);
    }

    public function edit($id)
    {
        $date =$this->model->findOrFail($id);
        return $date ;
    }

    public function update($data,$id)
    {
        $object =$this->model->findOrFail($id);
        $object->update($data);
    }

    public function delete($id)
    {
        $object =$this->model->findOrFail($id);
        $object->delete();
    }

}

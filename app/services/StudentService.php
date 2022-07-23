<?php

namespace App\services;


use App\Models\Student;

class StudentService
{
    public $model ;

    public function __construct(Student $model)
    {
        $this->model = $model ;
    }

    public function getAll($withRelation=[])
    {
        return $this->model->with($withRelation)->get();
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\services\DepartmentService;

class DepartmentController extends Controller
{

    public $model;
    public function __construct(DepartmentService $departmentService)
    {
        $this->model = $departmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->model->getAll();
        return view('dashboard.department.index',compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $data=$request->validated() ;
        try {
            $this->model->create($data);
            return redirect()->route('departments.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = $this->model->edit($id);
        return view('dashboard.department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $data=$request->validated() ;
        try {
            $this->model->update($data,$id);
            return redirect()->route('departments.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model->delete($id);
            return redirect()->route('departments.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }
    }
}

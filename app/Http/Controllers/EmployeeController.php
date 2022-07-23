<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\services\DepartmentService;
use App\services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public $model;
    public function __construct(EmployeeService $teacherService)
    {
        $this->model = $teacherService;
    }

    public function index()
    {
        $withRelation = ['department'];
        $employees = $this->model->getAll($withRelation);
        return view('dashboard.employee.index',compact('employees'));

    }

    public function create()
    {
        $departments = app(DepartmentService::class)->getAll();
        return view('dashboard.employee.create',compact('departments'));
    }


    public function store(EmployeeRequest $request)
    {

        $data=$request->validated() ;
        if (isset($data['is_active']))
            $data['is_active']=1;
        else
            $data['is_active']=0;
        try {
            $this->model->create($data);
            return redirect()->route('employees.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

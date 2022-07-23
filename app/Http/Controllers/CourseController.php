<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\services\CourseService;
use App\services\DepartmentService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public $model;
    public function __construct(CourseService $courseService)
    {
        $this->model = $courseService;
    }

    public function index()
    {
        $withRelation = ['department'];
        $courses = $this->model->getAll($withRelation);
        return view('dashboard.course.index',compact('courses'));

    }

    public function create()
    {
        $departments = app(DepartmentService::class)->getAll();
        return view('dashboard.course.create',compact('departments'));
    }


    public function store(CourseRequest $request)
    {
        $data=$request->validated() ;
        try {
            $this->model->create($data);
            return redirect()->route('courses.index')->with('done','تمت العمليه بنجاح');
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

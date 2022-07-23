<?php

namespace App\Http\Controllers;

use App\Enum\UserType;
use App\Http\Requests\CourseSubscriptionRequest;
use App\Models\CatchReceipt;
use App\Models\Course;
use App\Models\CourseSubscription;
use App\Models\Employee;
use App\Models\Student;
use App\services\CourseService;
use App\services\StudentService;
use App\services\EmployeeService;
use Illuminate\Http\Request;

class CourseSubscriptionController extends Controller
{

    public function index()
    {
        $courseSubscriptions = CourseSubscription::with(['course','student','employee'])->get();
        return view('dashboard.course-subscription.index',compact('courseSubscriptions'));
    }


    public function create()
    {
        $students = Student::all();
        $courses = app(CourseService::class)->getAll();
        $teachers = Employee::where('employee_type',UserType::$TEACHER)->get();
        $employees = Employee::where('employee_type',UserType::$EMPLOYEE)->get();
        return view('dashboard.course-subscription.create',compact('courses','teachers','employees','students'));
    }


    public function store(CourseSubscriptionRequest $request)
    {

        try {

            $course = Course::findOrFail($request->course_id);
            $student = Student::findOrFail($request->student_id);
            $courseSubscriptionData = [
                'course_id'=>$course->id,
                'teacher_id'=>$request->teacher_id,
                'student_id'=>$request->student_id,
                'payment'=>$request->payment,
                'remain'=>(int) $course->price - $request->payment,
                'employee_code' =>$request->employee_code
            ];
            if ($courseSubscriptionData['remain'] < 1)
                $courseSubscriptionData['is_done']=1;
            $courseSubscription = CourseSubscription::create($courseSubscriptionData);
            if ($courseSubscription)
            {
                $message =$course->name ."عن اشتراك كورس ".$student->name."تحصيل من الطالب ";
                CatchReceipt::create([
                        'value'=>$courseSubscription->payment,
                        'note'=>$message
                ]);
            }

            return redirect()->route('course-subscription.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception)
        {
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function payment($id)
    {
        $courseSubscription = CourseSubscription::with(['student','course'])->findOrFail($id);
        $message =$courseSubscription->course->name ."عن اشتراك كورس ".$courseSubscription->student->name."تحصيل من الطالب ";
        CatchReceipt::create([
            'value'=>$courseSubscription->remain,
            'note'=>$message
        ]);
        $courseSubscription->update(['remain'=>0]);
    }
}

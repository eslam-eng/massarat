<?php

namespace App\Http\Controllers;

use App\Enum\UserType;
use App\Models\CatchReceipt;
use App\Models\Course;
use App\Models\CourseSubscription;
use App\Models\Employee;
use App\Models\Receipt;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index()
    {
        $teachers = Employee::where('employee_type',UserType::$TEACHER)->get();
        $employees= Employee::where('employee_type',UserType::$EMPLOYEE)->get();
        $courses= Course::all();
        return view('dashboard.report.index',compact('teachers','employees','courses'));
    }


    public function getReportData(Request $request)
    {
        if ($request->has('date_from'))
            $dateFrom = Carbon::parse($request->date_from)->format('Y-mm-dd');
        if ($request->has('date_to'))
            $dateTo =Carbon::parse($request->date_from)->format('Y-mm-dd');

        $query = CourseSubscription::query();
        if ($request->has('teacher_id'))
            $query->where('teacher_id',$request->teacher_id);
        if ($request->has('employee_id'))
            $query->where('employee_id',$request->employee_id);
        if ($request->has('course_id'))
            $query->where('course_id',$request->course_id);
        if ($request->has('date_from')&&$request->has('date_to'))
            $query->whereBetween(DB::raw('date(created_at)'),[$dateFrom,$dateTo]);

        $result =  $query->where('is_done',1)->with(['course','student','teacher','employee'])->get();

        return view('dashboard.report.index',compact('result'));

    }

    public function expenseReport()
    {
        return view('dashboard.report.expense-report');
    }

    public function getExpenseReportData(Request $request)
    {
        if ($request->has('date_from')&&$request->has('date_to'))
        {
           $dateFrom =  Carbon::parse($request->date_from)->format('Y-mm-dd');
           $dateTo =Carbon::parse($request->date_from)->format('Y-mm-dd');

           $receipts = Receipt::whereBetween(DB::raw('date(created_at)'),[$dateFrom,$dateTo])->get();
           $catchReceipts = CatchReceipt::whereBetween(DB::raw('date(created_at)'),[$dateFrom,$dateTo])->get();

           return back()->with(['receipts'=>$receipts,'catchReceipts'=>$catchReceipts]);


        }

    }

}

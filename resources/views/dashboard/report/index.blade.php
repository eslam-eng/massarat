@extends('master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">الفلاتر</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <form action="{{route('report.getData')}}" id="reportForm" method="post" class="form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="dateFrom" class="filled">الفتره من</label>
                                                        <input type='date' name="date_from" class="form-control pickadate" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="dateTo" class="filled">الفتره الي</label>
                                                        <input type='date' name="date_to" class="form-control pickadate"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="teacher">الموظفين</label>
                                                            <select class="c-select form-control"  id="employee_id" name="employee_id">
                                                                <option disabled selected>اختر الموظف</option>
                                                                @foreach($employees as $employee)
                                                                    <option value="{{$employee->id}}">{{$employee->name . " / ". $employee->employee_code}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="teacher">المدرس/المحاضر</label>
                                                            <select class="c-select form-control"  id="teacher_id" name="teacher_id">
                                                                <option disabled selected>اختر المدرس</option>
                                                                @foreach($teachers as $teacher)
                                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="teacher">الكورس</label>
                                                            <select class="c-select form-control"  id="course_id" name="course_id">
                                                                <option disabled selected>اختر الكورس</option>
                                                                @foreach($courses as $course)
                                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" onclick="$('#reportForm')[0].reset()" id="cancelForm" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> الغاء
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> بحث
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @if(isset($result))
                    <section>
                        <div class="card">
                            <div class="card-header">

                                <div class="row">
                                    <div class="col-md-6"><h3>@if($result){{$result->first()->course->name}}@endif</h3>الكورس:</div>
                                    <div class="col-md-6"> <h3>{{$result->count()??0}}</h3>اجمالي :</div>
                                </div>

                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>الطالب</th>
                                            <th>الكورس</th>
                                            <th>المدرس/المحاضر</th>
                                            <th>الموظف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($result as $row)
                                            <tr>
                                                <td>{{$row->student->name}}</td>
                                                <td>{{$row->course->name}}</td>
                                                <td>{{$row->teacher->name}}</td>
                                                <td>{{$row->employee->name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

            </div>
        </div>
    </div>
@endsection



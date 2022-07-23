@extends('master')
{{--@section('css')--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/css-rtl/plugins/forms/wizard.css')}}">--}}
{{--@endsection--}}
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="content-body">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">بيانات الكورس</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{route('course-subscription.store')}}" method="post" class="number-tab-steps wizard-notification">
                                           @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="student_id">الطالب</label>
                                                            <select class="c-select form-control"  id="student_id" name="student_id" required>
                                                                <option disabled selected>اختر الطالب</option>
                                                                @foreach($students as $student)
                                                                    <option value="{{$student->id}}">{{$student->name ." / ".$student->faculty}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">الكورس</label>
                                                            <select class="c-select form-control"  id="location1" name="course_id" required>
                                                                <option disabled selected>اختر الكورس</option>
                                                                @foreach($courses as $course)
                                                                    <option value="{{$course->id}}">{{$course->name ." / ".$course->price}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="teacher">المدرس/المحاضر</label>
                                                            <select class="c-select form-control"  id="teacher_id" name="teacher_id" required>
                                                                <option disabled selected>اختر المدرس</option>
                                                                @foreach($teachers as $teacher)
                                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="paid">المدفوع</label>
                                                            <input type="text" name="payment" class="form-control" id="paid" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="teacher">كود الموظف</label>
                                                            <select class="c-select form-control"  id="teacher_id" name="teacher_id" required>
                                                                <option disabled selected>اختر الموظف</option>
                                                                @foreach($employees as $employee)
                                                                    <option value="{{$employee->id}}">{{$employee->name . " / ". $employee->employee_code}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                               <div class="form-actions">
                                                   <button type="button" id="cancelForm" class="btn btn-warning mr-1">
                                                       <i class="ft-x"></i> الغاء
                                                   </button>
                                                   <button type="submit" class="btn btn-primary">
                                                       <i class="la la-check-square-o"></i> حفظ
                                                   </button>
                                               </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
{{--    <script src="{{asset('dashboard/app-assets/vendors/js/extensions/jquery.steps.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('dashboard/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('dashboard/app-assets/js/scripts/forms/wizard-steps.js')}}" type="text/javascript"></script>--}}
{{--@endsection--}}

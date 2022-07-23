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
                                    <h4 class="card-title">المعلمين</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a role="button" class="btn btn-sm btn-primary" href="{{route('employees.create')}}"><i class="la la-plus la-sm"></i>اضافة</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>القسم</th>
                                                <th>رقم التليفون</th>
                                                <th>النوع</th>
                                                <th>الحالة</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($employees as $employee)
                                                    <tr>
                                                        <td>{{$employee->name . " / " . $employee->employee_code}}</td>
                                                        <td>
                                                            <span class="badge badge-info">{{$employee->department->name}}</span>
                                                        </td>
                                                        <td>{{$employee->phone}}</td>
                                                        <td>{{$employee->employee_type==\App\Enum\UserType::$TEACHER?'مدرس':'موظف'}}</td>
                                                        <td>
                                                            <span class="badge {{$employee->is_active==1?'badge-success':'badge-danger'}}">{{$employee->is_active==1?'نشط':'غير نشط'}}</span>
                                                        </td>
                                                        <td>{{$employee->created_at}}</td>
                                                        <td>
                                                            <a role="button" href="{{route('employees.edit',$employee->id)}}" class="btn btn-warning"><i class="la la-edit"></i></a>
                                                            <a role="button" href="{{route('employees.destroy',$employee->id)}}" class="btn btn-danger"><i class="la la-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

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
                                    <h4 class="card-title">الطلاب</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a role="button" class="btn btn-sm btn-primary" href="{{route('students.create')}}"><i class="la la-plus la-sm"></i>اضافة</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>الكليه</th>
                                                <th>رقم التليفون</th>
                                                <th>الحالة</th>
                                                <th>العنوان</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
                                                    <tr>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->faculty}}</td>
                                                        <td>{{$student->phone}}</td>
                                                        <td>
                                                            <span class="badge {{$student->status==1?'badge-success':'badge-danger'}}">{{$student->status==1?'نشط':'غير نشط'}}</span>
                                                        </td>
                                                        <td>{{$student->address}}</td>
                                                        <td>{{$student->created_at}}</td>
                                                        <td>
                                                            <a role="button" href="{{route('students.edit',$student->id)}}" class="btn btn-warning"><i class="la la-edit"></i></a>
                                                            <form method="post" action="{{route('students.destroy',$student->id)}}" style="display: inline-block">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"  class="btn btn-danger"><i class="la la-trash-o"></i></button>
                                                            </form>
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

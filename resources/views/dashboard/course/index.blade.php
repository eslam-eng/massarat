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
                                    <h4 class="card-title">الكورسات</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a role="button" class="btn btn-sm btn-primary" href="{{route('courses.create')}}"><i class="la la-plus la-sm"></i>اضافة</a></li>
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
                                                <th>ألسعر</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($courses as $course)
                                                    <tr>
                                                        <td>{{$course->name}}</td>
                                                        <td>
                                                            <span class="badge badge-info">{{$course->department->name}}</span>
                                                        </td>
                                                        <td>{{$course->price}}</td>
                                                        <td>{{$course->created_at}}</td>
                                                        <td>
                                                            <a role="button" href="{{route('courses.edit',$course->id)}}" class="btn btn-warning"><i class="la la-edit"></i></a>
                                                            <form method="post" action="{{route('courses.destroy',$course->id)}}" style="display: inline-block">
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

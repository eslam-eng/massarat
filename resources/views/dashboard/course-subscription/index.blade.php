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
                                    <h4 class="card-title">اشتراكات الكورسات</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a role="button" class="btn btn-sm btn-primary" href="{{route('course-subscription.create')}}"><i class="la la-plus la-sm"></i>اضافة</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>الكورس</th>
                                                <th>المحاضر</th>
                                                <th>الطالب</th>
                                                <th>المدفوع</th>
                                                <th>المتبقي</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($courseSubscriptions as $courseSubscription)
                                                    <tr>
                                                        <td>{{$courseSubscription->course->name}}</td>
                                                        <td>{{$courseSubscription->teacher->name}}</td>
                                                        <td>{{$courseSubscription->student->name}}</td>
                                                        <td>{{$courseSubscription->payment}}</td>
                                                        <td>
                                                            <span class="badge badge-danger">{{$courseSubscription->remain}}</span>
                                                        </td>
                                                        <td>{{$courseSubscription->created_at}}</td>
                                                        <td>
                                                            <a role="button" href="{{route('course-subscription.edit',$courseSubscription->id)}}" class="btn btn-warning"><i class="la la-edit"></i></a>
{{--                                                            <a role="button" href="{{route('course-subscription.destroy',$courseSubscription->id)}}" class="btn btn-danger"><i class="la la-trash-o"></i></a>--}}
                                                            <a role="button" href="{{route('course-subscription.payment',$courseSubscription->id)}}" class="btn btn-success"><i class="la la-money"></i></a>
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

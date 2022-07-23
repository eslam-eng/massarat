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
                                        <form action="{{route('report.getExpenseReportData')}}" id="reportForm" method="post" class="form">
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

                    <section>
                        <div class="card">
                            <h5>اسناد الصرف</h5>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>القيمه</th>
                                            <th>البيان</th>
                                            <th>التاريخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($receipts))
                                            @foreach($receipts as $row)
                                            <tr>
                                                <td>{{$row->value}}</td>
                                                <td>{{$row->note}}</td>
                                                <td>{{$row->create_at->format('Y-m-d h:i:s a')}}</td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                        @if(isset($catchReceipts))
                                            @foreach($catchReceipts as $row)
                                                <tr>
                                                    <td>{{$row->value}}</td>
                                                    <td>{{$row->note}}</td>
                                                    <td>{{$row->create_at->format('Y-m-d h:i:s a')}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </div>
@endsection



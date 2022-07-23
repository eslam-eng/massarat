@extends('master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">معلومات سند القبض</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{route('departments.update',$catchReceipt->id)}}" method="post" class="form">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">القيمه</label>
                                                            <input type="text" id="value" value="{{$catchReceipt->value}}" class="form-control @error('value') is-invalid @enderror" placeholder="اسم القسم" name="value">
                                                            @error('value')
                                                            <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="price">البيان</label>
                                                            <input type="text" id="note" value="{{$catchReceipt->note}}" class="form-control @error('note') is-invalid @enderror" name="note">
                                                            @error('note')
                                                            <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection

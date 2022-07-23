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
                                    <h4 class="card-title" id="basic-layout-form">معلومات المدرس</h4>
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
                                        <form action="{{route('employees.store')}}" method="post" class="form">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="employee_type">النوع</label>
                                                            <select id="department_id" name="employee_type" class="form-control">
                                                                <option selected="" disabled="">من فضلك اختر النوع</option>
                                                                <option value="{{\App\Enum\UserType::$TEACHER}}">مدرس</option>
                                                                <option value="{{\App\Enum\UserType::$EMPLOYEE}}">موظف</option>
                                                            </select>
                                                            @error('employee_type')
                                                            <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="department_id">القسم</label>
                                                            <select id="department_id" name="department_id" class="form-control">
                                                                <option selected="" disabled="">من فضلك اختر القسم</option>
                                                                @foreach($departments as $department)
                                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('department_id')
                                                            <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">الاسم</label>
                                                            <input type="text" id="name" class="form-control @error('title') is-invalid @enderror" placeholder="اسم القسم" name="name">
                                                            @error('name')
                                                            <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">رقم التليفون</label>
                                                            <input type="text" id="phone" class="form-control @error('title') is-invalid @enderror" placeholder="رقم التليفون" name="phone">
                                                            @error('phone')
                                                            <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="address">العنوان</label>
                                                            <input type="text" id="address" class="form-control @error('title') is-invalid @enderror" name="address">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="employee_code">الكود</label>
                                                            <input type="text" id="employee_code" class="form-control @error('title') is-invalid @enderror" name="employee_code">
                                                        </div>
                                                        @error('employee_code')
                                                        <span class="text- text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <fieldset class="mt-3">
                                                                <input type="checkbox" checked name="is_active" id="checkbox_isactive">
                                                                <label for="address">الحالة(نشط/غير نشط)</label>
                                                            </fieldset>
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
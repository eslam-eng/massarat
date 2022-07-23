<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active"><a href="/"><i class="la la-home"></i><span class="menu-title">الرئيسية</span></a></li>
            <li class=" navigation-header">
                <span>الاعدادات</span>
                <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title">الاقسام</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('departments.index')}}">عرض</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('departments.create')}}">اضافة</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-book"></i><span class="menu-title">الكورسات</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('courses.index')}}">عرض</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('courses.create')}}">اضافة</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title">الموظفين</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('employees.index')}}">عرض</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('employees.create')}}">اضافة</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title">الطلاب</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('students.index')}}">عرض</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('students.create')}}">اضافة</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title">اشتراكات الكورسات</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('course-subscription.index')}}">عرض</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('course-subscription.create')}}">اضافة</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title">اسناد الصرف/القبض</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title">اسناد الصرف</span></a>
                        <ul class="menu-content">
                            <li>
                                <a class="menu-item" href="{{route('receipt.index')}}">عرض</a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{route('receipt.create')}}">اضافة</a>
                            </li>
                        </ul>
                    </li>

                    <li class=" nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title">اسناد القبض</span></a>
                        <ul class="menu-content">
                            <li>
                                <a class="menu-item" href="{{route('catch-receipt.index')}}">عرض</a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{route('catch-receipt.create')}}">اضافة</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">التقارير</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('report.index')}}">تقرير اشتراكات الكورسات</a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{route('report.expenseReport')}}">تقرير المصروفات/المدخلات</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

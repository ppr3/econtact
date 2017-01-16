<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <!-- Optionally, you can add icons to the links -->

                <li class="treeview active">
                    <a href="{{ route('staff') }}"><i class='fa fa-users'></i> 
                    <span>{{ trans('app.staff_title') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('staff.create') }}"><i class="fa fa-floppy-o"></i> {{ trans('app.staff_add') }}</a></li>
                        <li><a href="{{ route('staff') }}"><i class="fa fa-pencil-square-o"></i> {{ trans('app.staff_edit') }}</a></li>
                        <li><a href="{{ route('staff') }}"><i class="fa fa-search"></i> {{ trans('app.staff_search') }}</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="{{ route('division') }}"><i class='fa fa-sitemap'></i> 
                    <span>{{ trans('app.division_title') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('division.create') }}"><i class="fa fa-floppy-o"></i> {{ trans('app.division_add') }}</a></li>
                        <li><a href="{{ route('division') }}"><i class="fa fa-pencil-square-o"></i> {{ trans('app.division_edit') }}</a></li>
                        <li><a href="{{ route('division') }}"><i class="fa fa-search"></i> {{ trans('app.division_search') }}</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="{{ route('subdivision') }}"><i class='fa fa-university'></i> 
                    <span>{{ trans('app.subdivision_title') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('subdivision.create') }}"><i class="fa fa-floppy-o"></i> {{ trans('app.subdivision_add') }}</a></li>
                        <li><a href="{{ route('subdivision') }}"><i class="fa fa-pencil-square-o"></i> {{ trans('app.subdivision_edit') }}</a></li>
                        <li><a href="{{ route('subdivision') }}"><i class="fa fa-search"></i> {{ trans('app.subdivision_search') }}</a></li>
                    </ul>
                </li>
                
                <!--
                <li class="treeview">
                    <a href="{{ route('user') }}"><i class='fa fa-user'></i> 
                    <span>{{ trans('app.usermenu_title') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.create') }}"><i class="fa fa-floppy-o"></i> {{ trans('app.usermenu_add') }}</a></li>
                        <li><a href="{{ route('user') }}"><i class="fa fa-search"></i> {{ trans('app.usermenu_search') }}</a></li>
                    </ul>
                </li>
                -->
           


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

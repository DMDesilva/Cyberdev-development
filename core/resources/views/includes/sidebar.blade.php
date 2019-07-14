  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{url('/')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        {{-- <li>
          <a href="{{route('client.index')}}">
            <i class="fa fa-dashboard"></i> <span>Clients</span>
          </a>
          
        </li> --}}

        {{-- <li>
          <a href="{{route('service.index')}}">
            <i class="fa fa-dashboard"></i> <span>Services</span>
          </a>
          
        </li> --}}

        {{-- <li>
          <a href="{{route('payment.index')}}">
            <i class="fa fa-dashboard"></i> <span>Payments</span>
          </a>
        </li> --}}

        {{-- <li>
          <a href="{{route('payment.email.send')}}">
            <i class="fa fa-dashboard"></i> <span>Send emails</span>
          </a>
        </li> --}}
        
        {{-- <li>
          <a href="{{route('emaillog.index')}}">
            <i class="fa fa-dashboard"></i> <span>Email Log</span>
          </a>
        </li> --}}

        <li>
          <a href="{{route('position.index')}}">
            <i class="fa fa-dashboard"></i> <span>Positions</span>
          </a>
        </li>

        {{--<li>--}}
          {{--<a href="{{route('developer.index')}}">--}}
            {{--<i class="fa fa-dashboard"></i> <span>Developers</span>--}}
          {{--</a>--}}
        {{--</li>--}}

        <li>
          <a href="{{route('project.index')}}">
            <i class="fa fa-dashboard"></i> <span>Projects</span>
          </a>
        </li>

        {{-- <li>
          <a href="{{route('mailtype.index')}}">
            <i class="fa fa-dashboard"></i> <span>Mail Types</span>
          </a>
        </li> --}}

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Developer Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route ('developer.index')}}"><i class="fa fa-dashboard"></i>Developers</a></li>
            <li><a href="{{route ('developergroup.index')}}"><i class="fa fa-dashboard"></i>Groups</a></li>
            <li><a href="{{route ('developermail.index')}}"><i class="fa fa-dashboard"></i>Developer Mail</a></li>
            <li><a href="{{route ('developermaillog.index')}}"><i class="fa fa-dashboard"></i>Developer Mail Log</a></li>
          </ul>
        </li>

        <li>
          <a href="{{route('repository.index')}}">
            <i class="fa fa-dashboard"></i> <span>Repository</span>
          </a>
        </li>

		{{--<li>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Users</span>
          </a>
        </li> --}}

        <li>
          <a href="{{route('task.index')}}">
            <i class="fa fa-dashboard"></i> <span>Tasks</span>
          </a>
        </li>

        <li>
          <a href="{{route('deadline.index')}}">
            <i class="fa fa-dashboard"></i> <span>Deadlines</span>
          </a>
        </li>

        <li>
          <a href="{{url('Developerpayment')}}">
            <i class="fa fa-dashboard"></i> <span>Developer payments</span>
          </a>
        </li>

        <li>
          <a href="{{url('communication')}}">
            <i class="fa fa-dashboard"></i> <span>Communication</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>User Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('permisionmanagement')}}"><i class="fa fa-dashboard"></i>Permissions</a></li>
            <li><a href="{{url('rolemanagement')}}"><i class="fa fa-dashboard"></i>Role</a></li>
            <li><a href="{{url('usermanagement')}}"><i class="fa fa-dashboard"></i>User</a></li>
            
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
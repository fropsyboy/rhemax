<div class="sidebar" data-color="danger" data-background-color="white" data-image="{{ asset('back/img/sidebar-1.jpg') }}">
        <!-- Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag -->
      <div class="logo">
        <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
          RHEMAX (RMX)
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item @if($page=='Dashboard') active @endif ">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
            <!-- <li class="nav-item @if($page=='Messages') active @endif">
                <a class="nav-link " href="{{ route('messages') }}">
                    <i class="material-icons">mail</i>
                    <p>Message</p>
                </a>
            </li> -->

          <li class="nav-item ">
            <a class="nav-link" href="{{route('transaction')}}">
              <i class="material-icons">mails</i>
              <p>Transactions</p>
            </a>
          </li>
            <li class="nav-item @if($page=='User') active @endif">
                <a class="nav-link " href="{{ route('user') }}">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>

            <li class="nav-item @if($page=='User') active @endif">
                <a class="nav-link " href="{{ route('skills') }}">
                    <i class="material-icons">view_carousel</i>
                    <p>My Skills</p>
                </a>
            </li>

            <li class="nav-item @if($page=='User') active @endif">
                <a class="nav-link " href="{{ route('library') }}">
                    <i class="material-icons">unarchive</i>
                    <p>My Library</p>
                </a>
            </li>
            @role('admin')

            <li class="nav-item ">
            <a class="nav-link" href="{{route('admin-transaction')}}">
              <i class="material-icons">library_books</i>
              <p>Top Ups</p>
            </a>
          </li>

          <li class="nav-item @if($page=='AdminUsers') active @endif">
            <a class="nav-link" href="{{route('adminUsers')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Users</p>
            </a>
          </li>

          <li class="nav-item @if($page=='Write ups') active @endif">
            <a class="nav-link" href="{{route('write_ups')}}">
              <i class="material-icons">apps</i>
              <p>Write-Ups</p>
            </a>
          </li>
            @endrole

{{--          <li class="nav-item ">--}}
{{--            <a class="nav-link" href="#">--}}
{{--              <i class="material-icons">notifications</i>--}}
{{--              <p>Notifications</p>--}}
{{--            </a>--}}
{{--          </li>--}}

        </ul>
      </div>
    </div>

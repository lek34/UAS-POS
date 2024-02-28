<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Customer</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.master.supplier.index') }}" class="nav-link">Supplier</a>
      </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{route('profile.edit')}}">Profile</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

  </ul>

<nav class="sidebar">
    <div class="sidebar-header">
      
      <a href="{{URL::to('/'.$userURL)}}" class="sidebar-brand">
        Car<span>Parking</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Users</li>
        <li class="nav-item">
          <a href="{{URL::to($userURL.'/users/create')}}" class="nav-link">
            <i class="link-icon" data-feather="user-plus"></i>
            <span class="link-title">Add User</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to($userURL.'/users')}}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Users</span>
          </a>
        </li>
        <li class="nav-item nav-category">Vehicles</li>
        <li class="nav-item">
          <a href="{{URL::to($userURL.'/vehicles')}}" class="nav-link">
            <i class="link-icon" data-feather="truck"></i>
            <span class="link-title">Add Vehicle</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a href="{{URL::to($userURL.'/vehicles/show')}}" class="nav-link">
            <i class="link-icon" data-feather="truck"></i>
            <span class="link-title">Vehicels</span>
          </a>
        </li>
        @if(Auth::user()->type == 'Admin')
        
        <li class="nav-item nav-category">ParkingSlots</li>


        <li class="nav-item">
          <a href="{{URL::to($userURL.'/parking/create')}}" class="nav-link">
            <i class="link-icon" data-feather="map-pin"></i>
            <span class="link-title">Add Parking</span>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{URL::to($userURL.'/parking')}}" class="nav-link">
            <i class="link-icon" data-feather="map-pin"></i>
            <span class="link-title">Parking</span>
          </a>
        </li>
        @endif
        <li class="nav-item nav-category">Parking Details </li>
   
        <li class="nav-item">
          <a href="{{URL::to($userURL.'/parkedCar')}}" class="nav-link">
            <i class="link-icon" data-feather="plus"></i>
            <span class="link-title">Add parked car</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to($userURL.'/parkedCar/parkedVehicles')}}" class="nav-link">
            <i class="link-icon" data-feather="truck"></i>
            <span class="link-title">View Parked Vehicles</span>
          </a>
        </li>

      </ul>
    </div>
  </nav>
  <nav class="settings-sidebar">
    <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
        <i data-feather="settings"></i>
      </a>
      <h6 class="text-muted mb-2">Sidebar:</h6>
      <div class="mb-3 pb-3 border-bottom">
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          <label class="form-check-label" for="sidebarLight">
            Light
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          <label class="form-check-label" for="sidebarDark">
            Dark
          </label>
        </div>
      </div>
      <div class="theme-wrapper">
        <h6 class="text-muted mb-2">Light Theme:</h6>
        <a class="theme-item active" href="https://www.nobleui.com/html/template/demo1/dashboard.html">
          <img src="https://www.nobleui.com/html/template/assets/images/screenshots/light.jpg" alt="light theme">
        </a>
        <h6 class="text-muted mb-2">Dark Theme:</h6>
        <a class="theme-item" href="https://www.nobleui.com/html/template/demo2/dashboard.html">
          <img src="https://www.nobleui.com/html/template/assets/images/screenshots/dark.jpg" alt="light theme">
        </a>
      </div>
    </div>
  </nav>
<header class="header" id="mainHeader">
      <button class="header-toggle" id="sidebarToggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
      </button>
      <div class="header-breadcrumb">
        <span class="bc-item">Ufunuo</span>
        <span class="bc-sep"><i class="fas fa-chevron-right"></i></span>
        <span class="bc-current" id="breadcrumbCurrent">@yield('breadcrumb', 'Dashboard')</span>
      </div>
      <div class="header-spacer"></div>
      <div class="header-search">
        <i class="fas fa-search search-icon"></i>
        <input type="text" placeholder="Search books, orders...">
      </div>
    <div class="header-actions">
        <!-- Language Switcher -->
        <div class="header-search" style="margin-right: 10px;">
            <select onchange="window.location.href='/lang/' + this.value" class="form-control" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 5px 10px; border-radius: 20px; font-size: 12px; cursor: pointer;">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="sw" {{ app()->getLocale() == 'sw' ? 'selected' : '' }}>Kiswahili</option>
            </select>
        </div>

        <button class="header-btn" onclick="toggleNotif()" title="Notifications">
          <i class="fas fa-bell"></i>
          <div class="notif-dot"></div>
        </button>
        
        <!-- User Profile RightStar -->
        <div class="user-profile-dropdown">
            <button class="header-btn profile-trigger" title="RightStar Profile">
                <div class="avatar-sm" style="background: var(--accent-2); margin-left: 0; width: 32px; height: 32px;">{{ substr(auth()->user()->name, 0, 2) }}</div>
            </button>
            <div class="profile-dropdown-content">
                <div class="dropdown-header">
                    <strong>{{ auth()->user()->name }}</strong>
                    <span>Administrator</span>
                </div>
                <a href="{{ route('profile.index') }}"><i class="fas fa-user"></i> My Profile</a>
                <a href="{{ route('profile.settings') }}"><i class="fas fa-cog"></i> Account Settings</a>
                <hr>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
    </header>

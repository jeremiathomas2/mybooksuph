<nav class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon"><i class="fas fa-book-open"></i></div>
      <div class="brand-text">
        <div class="brand-name">Ufunuo</div>
        <div class="brand-sub">Publishing House</div>
      </div>
    </div>
    <div class="sidebar-nav">
      <div class="nav-section-label">Main</div>
      <div class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}" onclick="location.href='{{ route('dashboard') }}'">
        <div class="nav-icon"><i class="fas fa-home"></i></div>
        <div class="nav-label">{{ __('messages.dashboard') }}</div>
      </div>
      <div class="nav-item {{ request()->is('books*') ? 'active' : '' }}" onclick="location.href='{{ route('books.index') }}'">
        <div class="nav-icon"><i class="fas fa-book"></i></div>
        <div class="nav-label">{{ __('messages.books') }}</div>
        <span class="nav-badge">142</span>
      </div>
      <div class="nav-section-label">Commerce</div>
      <div class="nav-item {{ request()->is('orders*') ? 'active' : '' }}" onclick="location.href='{{ route('orders.index') }}'">
        <div class="nav-icon"><i class="fas fa-shopping-cart"></i></div>
        <div class="nav-label">{{ __('messages.orders') }}</div>
        <span class="nav-badge">8</span>
      </div>
      <div class="nav-item {{ request()->is('payments*') ? 'active' : '' }}" onclick="location.href='{{ route('payments.index') }}'">
        <div class="nav-icon"><i class="fas fa-mobile-alt"></i></div>
        <div class="nav-label">{{ __('messages.payments') }}</div>
      </div>
      <div class="nav-section-label">Logistics</div>
      <div class="nav-item {{ request()->is('delivery*') ? 'active' : '' }}" onclick="location.href='{{ route('delivery.index') }}'">
        <div class="nav-icon"><i class="fas fa-truck"></i></div>
        <div class="nav-label">{{ __('messages.delivery') }}</div>
      </div>
      <div class="nav-item {{ request()->is('transport*') ? 'active' : '' }}" onclick="location.href='{{ route('transport.index') }}'">
        <div class="nav-icon"><i class="fas fa-bus"></i></div>
        <div class="nav-label">{{ __('messages.transport') }}</div>
      </div>
      <div class="nav-section-label">People</div>
      <div class="nav-item {{ request()->is('agents*') ? 'active' : '' }}" onclick="location.href='{{ route('agents.index') }}'">
        <div class="nav-icon"><i class="fas fa-church"></i></div>
        <div class="nav-label">{{ __('messages.agents') }}</div>
      </div>
      <div class="nav-item {{ request()->is('buyers*') ? 'active' : '' }}" onclick="location.href='{{ route('buyers.index') }}'">
        <div class="nav-icon"><i class="fas fa-users"></i></div>
        <div class="nav-label">{{ __('messages.buyers') }}</div>
      </div>
      <div class="nav-section-label">Integrations</div>
      <div class="nav-item {{ request()->is('integrations/payments*') ? 'active' : '' }}" onclick="location.href='{{ route('integrations.payments') }}'">
        <div class="nav-icon"><i class="fas fa-credit-card"></i></div>
        <div class="nav-label">{{ __('messages.payment_integration') }}</div>
      </div>
      <div class="nav-item {{ request()->is('integrations/sms*') ? 'active' : '' }}" onclick="location.href='{{ route('integrations.sms') }}'">
        <div class="nav-icon"><i class="fas fa-sms"></i></div>
        <div class="nav-label">{{ __('messages.sms_integration') }}</div>
      </div>
      <div class="nav-section-label">System</div>
      <div class="nav-item {{ request()->is('settings/system*') ? 'active' : '' }}" onclick="location.href='{{ route('settings.system') }}'">
        <div class="nav-icon"><i class="fas fa-cogs"></i></div>
        <div class="nav-label">{{ __('messages.system_settings') }}</div>
      </div>
      <div class="nav-item {{ request()->is('reports*') ? 'active' : '' }}" onclick="location.href='{{ route('reports.index') }}'">
        <div class="nav-icon"><i class="fas fa-chart-bar"></i></div>
        <div class="nav-label">{{ __('messages.reports') }}</div>
      </div>
      <div class="nav-item {{ request()->is('inventory*') ? 'active' : '' }}" onclick="location.href='{{ route('inventory.index') }}'">
        <div class="nav-icon"><i class="fas fa-boxes"></i></div>
        <div class="nav-label">{{ __('messages.inventory') }}</div>
      </div>
      <div class="nav-item" onclick="toggleSettings()">
        <div class="nav-icon"><i class="fas fa-cog"></i></div>
        <div class="nav-label">{{ __('messages.settings') }}</div>
      </div>
    </div>
    <div class="sidebar-footer">
      <div class="sidebar-user">
        <div class="user-avatar">AD</div>
        <div class="user-info">
          <div class="user-name">Admin User</div>
          <div class="user-role">Publisher Administrator</div>
        </div>
      </div>
    </div>
  </nav>

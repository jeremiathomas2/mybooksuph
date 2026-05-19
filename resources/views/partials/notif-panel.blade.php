<div class="notif-panel" id="notifPanel">
  <div class="notif-header">
    <div class="notif-title">Notifications</div>
    <div style="display:flex;gap:8px;align-items:center">
      <span class="badge badge-info" id="notifCount">5 New</span>
      <button class="btn btn-sm btn-outline" onclick="markAllRead()">Mark All Read</button>
    </div>
  </div>
  <div class="notif-items">
    <div class="notif-item unread" onclick="this.classList.remove('unread')">
      <div class="notif-item-icon" style="background:#e8f2fc;color:var(--accent)"><i class="fas fa-shopping-cart"></i></div>
      <div class="notif-item-content">
        <div class="notif-item-title">New Order Received</div>
        <div class="notif-item-body">Bethel Church placed an order for 25 books</div>
        <div class="notif-item-time">2 minutes ago</div>
      </div>
      <div class="unread-dot"></div>
    </div>
    <div class="notif-item unread" onclick="this.classList.remove('unread')">
      <div class="notif-item-icon" style="background:#e8f8ef;color:var(--success)"><i class="fas fa-money-bill-wave"></i></div>
      <div class="notif-item-content">
        <div class="notif-item-title">Payment Confirmed</div>
        <div class="notif-item-body">Order #ORD-2024-089 payment received via M-Pesa</div>
        <div class="notif-item-time">15 minutes ago</div>
      </div>
      <div class="unread-dot"></div>
    </div>
    <div class="notif-item unread" onclick="this.classList.remove('unread')">
      <div class="notif-item-icon" style="background:#fef4e4;color:var(--warning)"><i class="fas fa-truck"></i></div>
      <div class="notif-item-content">
        <div class="notif-item-title">Shipment Dispatched</div>
        <div class="notif-item-body">Dar Express collected order #ORD-2024-085</div>
        <div class="notif-item-time">1 hour ago</div>
      </div>
      <div class="unread-dot"></div>
    </div>
    <div class="notif-item unread" onclick="this.classList.remove('unread')">
      <div class="notif-item-icon" style="background:#fdecea;color:var(--danger)"><i class="fas fa-exclamation-triangle"></i></div>
      <div class="notif-item-content">
        <div class="notif-item-title">Low Stock Alert</div>
        <div class="notif-item-body">"Daily Devotional 2024" — only 5 copies remaining</div>
        <div class="notif-item-time">3 hours ago</div>
      </div>
      <div class="unread-dot"></div>
    </div>
    <div class="notif-item unread" onclick="this.classList.remove('unread')">
      <div class="notif-item-icon" style="background:#f0ebff;color:#7c5cbf"><i class="fas fa-user-plus"></i></div>
      <div class="notif-item-content">
        <div class="notif-item-title">New Church Agent Registered</div>
        <div class="notif-item-body">Mwanga SDA Church has joined the platform</div>
        <div class="notif-item-time">5 hours ago</div>
      </div>
      <div class="unread-dot"></div>
    </div>
    <div class="notif-item" onclick="">
      <div class="notif-item-icon" style="background:#e4f6f6;color:#1a9090"><i class="fas fa-check-circle"></i></div>
      <div class="notif-item-content">
        <div class="notif-item-title">Delivery Completed</div>
        <div class="notif-item-body">Order #ORD-2024-081 delivered to Grace Church</div>
        <div class="notif-item-time">Yesterday</div>
      </div>
    </div>
  </div>
</div>

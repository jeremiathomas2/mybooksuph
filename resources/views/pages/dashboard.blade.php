@extends('layouts.app')

@section('title', 'Dashboard — Ufunuo Publishing House')
@section('breadcrumb', 'Dashboard')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">{{ __('messages.good_morning') }}, {{ auth()->user()->name }} 👋</div>
            <div class="page-subtitle">{{ __('messages.happening_today') }}</div>
        </div>
        <div class="page-actions">
            <button class="btn btn-outline" onclick="openModal('bookModal')"><i class="fas fa-plus"></i> {{ __('messages.add_book') }}</button>
            <button class="btn btn-primary" onclick="openModal('orderModal')"><i class="fas fa-shopping-cart"></i> {{ __('messages.new_order') }}</button>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-book"></i></div>
            <div class="stat-info">
                <div class="stat-value">142</div>
                <div class="stat-label">{{ __('messages.total_books') }}</div>
                <div class="stat-change up"><i class="fas fa-arrow-up"></i> 8 this month</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon amber"><i class="fas fa-shopping-cart"></i></div>
            <div class="stat-info">
                <div class="stat-value">1,284</div>
                <div class="stat-label">{{ __('messages.orders') }}</div>
                <div class="stat-change up"><i class="fas fa-arrow-up"></i> 12% vs last month</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-money-bill-wave"></i></div>
            <div class="stat-info">
                <div class="stat-value">TZS 4.2M</div>
                <div class="stat-label">{{ __('messages.revenue') }}</div>
                <div class="stat-change up"><i class="fas fa-arrow-up"></i> 18% growth</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon red"><i class="fas fa-truck"></i></div>
            <div class="stat-info">
                <div class="stat-value">38</div>
                <div class="stat-label">{{ __('messages.active_deliveries') }}</div>
                <div class="stat-change down"><i class="fas fa-arrow-down"></i> 3 delayed</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon purple"><i class="fas fa-church"></i></div>
            <div class="stat-info">
                <div class="stat-value">89</div>
                <div class="stat-label">Church Agents</div>
                <div class="stat-change up"><i class="fas fa-arrow-up"></i> 4 new this week</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon teal"><i class="fas fa-boxes"></i></div>
            <div class="stat-info">
                <div class="stat-value">8,450</div>
                <div class="stat-label">Books in Stock</div>
                <div class="stat-change down"><i class="fas fa-arrow-down"></i> 12 low stock alerts</div>
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS -->
    <div class="card" style="margin-bottom:20px">
        <div class="card-header">
            <div>
                <div class="card-title">Quick Actions</div>
                <div class="card-subtitle">Frequent tasks at your fingertips</div>
            </div>
        </div>
        <div class="card-body">
            <div class="quick-actions">
                <div class="quick-action" onclick="openModal('orderModal')">
                    <div class="quick-action-icon" style="background:#e8f2fc;color:var(--accent)"><i class="fas fa-plus-circle"></i></div>
                    <div class="quick-action-label">New Order</div>
                </div>
                <div class="quick-action" onclick="openModal('bookModal')">
                    <div class="quick-action-icon" style="background:#e8f8ef;color:var(--success)"><i class="fas fa-book-medical"></i></div>
                    <div class="quick-action-label">Add Book</div>
                </div>
                <div class="quick-action" onclick="location.href='{{ route('delivery.index') }}'">
                    <div class="quick-action-icon" style="background:#fef4e4;color:var(--warning)"><i class="fas fa-truck-moving"></i></div>
                    <div class="quick-action-label">Track Delivery</div>
                </div>
                <div class="quick-action" onclick="location.href='{{ route('payments.index') }}'">
                    <div class="quick-action-icon" style="background:#f0ebff;color:#7c5cbf"><i class="fas fa-check-circle"></i></div>
                    <div class="quick-action-label">Confirm Payment</div>
                </div>
                <div class="quick-action" onclick="location.href='{{ route('reports.index') }}'">
                    <div class="quick-action-icon" style="background:#e4f6f6;color:#1a9090"><i class="fas fa-chart-line"></i></div>
                    <div class="quick-action-label">View Reports</div>
                </div>
                <div class="quick-action" onclick="location.href='{{ route('inventory.index') }}'">
                    <div class="quick-action-icon" style="background:#fdecea;color:var(--danger)"><i class="fas fa-exclamation-circle"></i></div>
                    <div class="quick-action-label">Stock Alerts</div>
                </div>
                <div class="quick-action" onclick="location.href='{{ route('agents.index') }}'">
                    <div class="quick-action-icon" style="background:#fff3e0;color:#e65100"><i class="fas fa-user-plus"></i></div>
                    <div class="quick-action-label">Add Agent</div>
                </div>
                <div class="quick-action" onclick="showToast('Generating report...','info')">
                    <div class="quick-action-icon" style="background:#e3f2fd;color:#1565c0"><i class="fas fa-download"></i></div>
                    <div class="quick-action-label">Export Data</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS + RECENT -->
    <div class="grid-2">
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Monthly Sales</div>
                    <div class="card-subtitle">Books sold per month — 2024</div>
                </div>
                <select class="form-control" style="width:auto;padding:5px 10px;font-size:12px">
                    <option>2024</option><option>2023</option>
                </select>
            </div>
            <div class="card-body">
                <div class="chart-bars" id="salesChart">
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:45%"></div><div class="chart-bar-label">Jan</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:62%"></div><div class="chart-bar-label">Feb</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:55%"></div><div class="chart-bar-label">Mar</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:78%"></div><div class="chart-bar-label">Apr</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:68%"></div><div class="chart-bar-label">May</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:88%"></div><div class="chart-bar-label">Jun</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:72%"></div><div class="chart-bar-label">Jul</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar" style="height:95%"></div><div class="chart-bar-label">Aug</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar secondary" style="height:60%"></div><div class="chart-bar-label">Sep</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar secondary" style="height:75%"></div><div class="chart-bar-label">Oct</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar secondary" style="height:82%"></div><div class="chart-bar-label">Nov</div></div>
                    <div class="chart-bar-wrap"><div class="chart-bar secondary" style="height:91%"></div><div class="chart-bar-label">Dec</div></div>
                </div>
                <div class="chart-legend">
                    <div class="legend-item"><div class="legend-dot" style="background:var(--accent)"></div>Actual Sales</div>
                    <div class="legend-item"><div class="legend-dot" style="background:var(--accent-2)"></div>Projected</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Order Status Breakdown</div>
                    <div class="card-subtitle">Current order distribution</div>
                </div>
            </div>
            <div class="card-body">
                <div style="display:flex;align-items:center;gap:24px;flex-wrap:wrap">
                    <div class="donut-wrap">
                        <svg viewBox="0 0 120 120">
                            <circle cx="60" cy="60" r="48" fill="none" stroke="var(--border)" stroke-width="14"/>
                            <circle cx="60" cy="60" r="48" fill="none" stroke="var(--success)" stroke-width="14"
                                stroke-dasharray="120.96 180.96" stroke-dashoffset="0" stroke-linecap="round"
                                transform="rotate(-90 60 60)"/>
                            <circle cx="60" cy="60" r="48" fill="none" stroke="var(--accent)" stroke-width="14"
                                stroke-dasharray="75.4 226.4" stroke-dashoffset="-120.96" stroke-linecap="round"
                                transform="rotate(-90 60 60)"/>
                            <circle cx="60" cy="60" r="48" fill="none" stroke="var(--warning)" stroke-width="14"
                                stroke-dasharray="50.27 251.5" stroke-dashoffset="-196.36" stroke-linecap="round"
                                transform="rotate(-90 60 60)"/>
                            <circle cx="60" cy="60" r="48" fill="none" stroke="#7c5cbf" stroke-width="14"
                                stroke-dasharray="30.16 271.67" stroke-dashoffset="-246.63" stroke-linecap="round"
                                transform="rotate(-90 60 60)"/>
                        </svg>
                        <div class="donut-center">
                            <div class="donut-val">1,284</div>
                            <div class="donut-sub">TOTAL</div>
                        </div>
                    </div>
                    <div style="flex:1;display:flex;flex-direction:column;gap:10px">
                        <div style="display:flex;align-items:center;justify-content:space-between">
                            <div style="display:flex;align-items:center;gap:8px"><div style="width:12px;height:12px;border-radius:3px;background:var(--success)"></div><span style="font-size:13px;font-weight:600">Delivered</span></div>
                            <span style="font-weight:800;font-size:14px">642 <span style="color:var(--text-muted);font-size:11px">(50%)</span></span>
                        </div>
                        <div style="display:flex;align-items:center;justify-content:space-between">
                            <div style="display:flex;align-items:center;gap:8px"><div style="width:12px;height:12px;border-radius:3px;background:var(--accent)"></div><span style="font-size:13px;font-weight:600">In Transit</span></div>
                            <span style="font-weight:800;font-size:14px">384 <span style="color:var(--text-muted);font-size:11px">(30%)</span></span>
                        </div>
                        <div style="display:flex;align-items:center;justify-content:space-between">
                            <div style="display:flex;align-items:center;gap:8px"><div style="width:12px;height:12px;border-radius:3px;background:var(--warning)"></div><span style="font-size:13px;font-weight:600">Processing</span></div>
                            <span style="font-weight:800;font-size:14px">193 <span style="color:var(--text-muted);font-size:11px">(15%)</span></span>
                        </div>
                        <div style="display:flex;align-items:center;justify-content:space-between">
                            <div style="display:flex;align-items:center;gap:8px"><div style="width:12px;height:12px;border-radius:3px;background:#7c5cbf"></div><span style="font-size:13px;font-weight:600">Pending</span></div>
                            <span style="font-weight:800;font-size:14px">65 <span style="color:var(--text-muted);font-size:11px">(5%)</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:20px" class="grid-2">
        <!-- RECENT ORDERS -->
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Recent Orders</div>
                    <div class="card-subtitle">Latest 5 orders</div>
                </div>
                <button class="btn btn-sm btn-outline" onclick="location.href='{{ route('orders.index') }}'">View All</button>
            </div>
            <div class="table-wrap">
                <table>
                    <thead><tr><th>Order</th><th>Customer</th><th>Amount</th><th>Status</th></tr></thead>
                    <tbody>
                        <tr><td><strong>#ORD-089</strong></td><td>Bethel Church</td><td>TZS 125,000</td><td><span class="badge badge-pending"><span class="badge-dot"></span>Pending</span></td></tr>
                        <tr><td><strong>#ORD-088</strong></td><td>Mama Grace</td><td>TZS 22,500</td><td><span class="badge badge-paid"><span class="badge-dot"></span>Paid</span></td></tr>
                        <tr><td><strong>#ORD-087</strong></td><td>Mwanga Church</td><td>TZS 340,000</td><td><span class="badge badge-dispatched"><span class="badge-dot"></span>Dispatched</span></td></tr>
                        <tr><td><strong>#ORD-086</strong></td><td>Br. John Sanga</td><td>TZS 18,000</td><td><span class="badge badge-packed"><span class="badge-dot"></span>Packed</span></td></tr>
                        <tr><td><strong>#ORD-085</strong></td><td>Grace Chapel</td><td>TZS 85,000</td><td><span class="badge badge-delivered"><span class="badge-dot"></span>Delivered</span></td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- STOCK ALERTS -->
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Low Stock Alerts</div>
                    <div class="card-subtitle">Books needing restock</div>
                </div>
                <span class="badge badge-danger">12 Critical</span>
            </div>
            <div class="card-body" style="padding:0">
                <div style="display:flex;flex-direction:column">
                    <div style="padding:12px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px">
                        <div style="flex:1">
                            <div style="font-size:13px;font-weight:700">Daily Devotional 2024</div>
                            <div class="progress-bar-wrap" style="margin-top:6px"><div class="progress-bar red" style="width:5%"></div></div>
                        </div>
                        <span class="badge badge-danger">5 left</span>
                    </div>
                    <div style="padding:12px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px">
                        <div style="flex:1">
                            <div style="font-size:13px;font-weight:700">Sabbath School Q4</div>
                            <div class="progress-bar-wrap" style="margin-top:6px"><div class="progress-bar amber" style="width:12%"></div></div>
                        </div>
                        <span class="badge badge-warning">18 left</span>
                    </div>
                    <div style="padding:12px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px">
                        <div style="flex:1">
                            <div style="font-size:13px;font-weight:700">Steps to Christ (Swahili)</div>
                            <div class="progress-bar-wrap" style="margin-top:6px"><div class="progress-bar amber" style="width:18%"></div></div>
                        </div>
                        <span class="badge badge-warning">22 left</span>
                    </div>
                    <div style="padding:12px 16px;display:flex;align-items:center;gap:12px">
                        <div style="flex:1">
                            <div style="font-size:13px;font-weight:700">Children's Bible Stories</div>
                            <div class="progress-bar-wrap" style="margin-top:6px"><div class="progress-bar red" style="width:8%"></div></div>
                        </div>
                        <span class="badge badge-danger">9 left</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span style="font-size:12px;color:var(--text-muted)">Updated just now</span>
                <button class="btn btn-sm btn-outline" onclick="location.href='{{ route('inventory.index') }}'">Manage Stock</button>
            </div>
        </div>
    </div>
</div>
@endsection

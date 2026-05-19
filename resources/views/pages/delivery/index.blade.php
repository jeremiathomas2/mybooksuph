@extends('layouts.app')

@section('title', 'Delivery Tracking — Ufunuo Publishing House')
@section('breadcrumb', 'Delivery Tracking')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">Delivery Tracking</div>
            <div class="page-subtitle">Real-time shipment status across Tanzania</div>
        </div>
    </div>
    <div class="stats-grid" style="grid-template-columns:repeat(4,1fr);margin-bottom:20px">
        <div class="stat-card"><div class="stat-icon blue"><i class="fas fa-box"></i></div><div class="stat-info"><div class="stat-value">12</div><div class="stat-label">Ready for Pickup</div></div></div>
        <div class="stat-card"><div class="stat-icon amber"><i class="fas fa-truck"></i></div><div class="stat-info"><div class="stat-value">18</div><div class="stat-label">In Transit</div></div></div>
        <div class="stat-card"><div class="stat-icon green"><i class="fas fa-check-double"></i></div><div class="stat-info"><div class="stat-value">8</div><div class="stat-label">Delivered Today</div></div></div>
        <div class="stat-card"><div class="stat-icon red"><i class="fas fa-exclamation"></i></div><div class="stat-info"><div class="stat-value">3</div><div class="stat-label">Delayed</div></div></div>
    </div>

    <div class="card" style="margin-bottom:20px">
        <div class="card-header"><div class="card-title">Track Order #ORD-087 — Mwanga SDA Church</div></div>
        <div class="card-body">
            <div class="delivery-track">
                <div class="delivery-step done">
                    <div class="delivery-step-dot"><i class="fas fa-check"></i></div>
                    <div class="delivery-step-label">Order<br>Placed</div>
                </div>
                <div class="delivery-line done"></div>
                <div class="delivery-step done">
                    <div class="delivery-step-dot"><i class="fas fa-check"></i></div>
                    <div class="delivery-step-label">Payment<br>Confirmed</div>
                </div>
                <div class="delivery-line done"></div>
                <div class="delivery-step done">
                    <div class="delivery-step-dot"><i class="fas fa-check"></i></div>
                    <div class="delivery-step-label">Packed &<br>Ready</div>
                </div>
                <div class="delivery-line done"></div>
                <div class="delivery-step active">
                    <div class="delivery-step-dot"><i class="fas fa-truck"></i></div>
                    <div class="delivery-step-label">In<br>Transit</div>
                </div>
                <div class="delivery-line"></div>
                <div class="delivery-step">
                    <div class="delivery-step-dot"><i class="fas fa-home"></i></div>
                    <div class="delivery-step-label">Delivered</div>
                </div>
            </div>
            <div style="background:var(--accent-light);border-radius:var(--radius-sm);padding:14px;margin-top:12px">
                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                    <div style="font-size:20px">🚌</div>
                    <div style="flex:1">
                        <div style="font-size:13.5px;font-weight:800">Dar Express Bus Co. — Bus #DSM-ARU-45</div>
                        <div style="font-size:12px;color:var(--text-secondary);margin-top:2px">Departed Dar es Salaam 08:30 AM · Est. arrival Arusha: 16:00 PM</div>
                    </div>
                    <span class="badge badge-transit"><span class="badge-dot"></span>In Transit</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><div class="card-title">All Active Deliveries</div></div>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Delivery ID</th><th>Order</th><th>Customer</th><th>Transport Co.</th><th>Pickup Date</th><th>Est. Delivery</th><th>Status</th><th>Action</th></tr></thead>
                <tbody>
                    <tr>
                        <td><strong>#DEL-089</strong></td>
                        <td style="color:var(--accent)">#ORD-087</td>
                        <td>Mwanga SDA Church, Arusha</td>
                        <td>Dar Express</td>
                        <td class="td-muted">13 Jan</td>
                        <td class="td-muted">15 Jan</td>
                        <td><span class="badge badge-transit"><span class="badge-dot"></span>In Transit</span></td>
                        <td><button class="btn btn-sm btn-outline" onclick="showToast('Tracking updated!','info')"><i class="fas fa-map-marker-alt"></i> Track</button></td>
                    </tr>
                    <tr>
                        <td><strong>#DEL-088</strong></td>
                        <td style="color:var(--accent)">#ORD-082</td>
                        <td>Omega Church, Mwanza</td>
                        <td>Sumry Transport</td>
                        <td class="td-muted">12 Jan</td>
                        <td class="td-muted">14 Jan</td>
                        <td><span class="badge badge-pending"><span class="badge-dot"></span>Ready Pickup</span></td>
                        <td><button class="btn btn-sm btn-primary" onclick="showToast('Pickup assigned!','success')"><i class="fas fa-truck"></i> Assign</button></td>
                    </tr>
                    <tr>
                        <td><strong>#DEL-085</strong></td>
                        <td style="color:var(--accent)">#ORD-078</td>
                        <td>Grace Chapel, Mbeya</td>
                        <td>Kilimanjaro Express</td>
                        <td class="td-muted">10 Jan</td>
                        <td class="td-muted">12 Jan</td>
                        <td><span class="badge badge-delivered"><span class="badge-dot"></span>Delivered</span></td>
                        <td><button class="btn btn-sm btn-outline"><i class="fas fa-receipt"></i> Receipt</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

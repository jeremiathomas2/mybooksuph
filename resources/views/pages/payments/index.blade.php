@extends('layouts.app')

@section('title', 'Payment Management — Ufunuo Publishing House')
@section('breadcrumb', 'Payment Management')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">Payment Management</div>
            <div class="page-subtitle">Track and verify mobile money payments</div>
        </div>
    </div>
    <div class="stats-grid" style="grid-template-columns:repeat(3,1fr);margin-bottom:20px">
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info"><div class="stat-value">TZS 4.2M</div><div class="stat-label">Confirmed This Month</div></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon amber"><i class="fas fa-clock"></i></div>
            <div class="stat-info"><div class="stat-value">TZS 340K</div><div class="stat-label">Pending Verification</div></div>
        </div>
        <div class="stat-card">
            <div class="stat-icon red"><i class="fas fa-times-circle"></i></div>
            <div class="stat-info"><div class="stat-value">TZS 45K</div><div class="stat-label">Failed / Disputed</div></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Payment Transactions</div>
            <div class="filter-chips">
                <div class="filter-chip active">All</div>
                <div class="filter-chip">M-Pesa</div>
                <div class="filter-chip">Tigo Pesa</div>
                <div class="filter-chip">Airtel Money</div>
            </div>
        </div>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Payment ID</th><th>Order</th><th>Payer</th><th>Amount</th><th>Method</th><th>Transaction ID</th><th>Date</th><th>Status</th><th>Action</th></tr></thead>
                <tbody>
                    <tr>
                        <td><strong>#PAY-2024-154</strong></td>
                        <td style="color:var(--accent)">#ORD-089</td>
                        <td>Bethel SDA Church</td>
                        <td><strong>TZS 125,000</strong></td>
                        <td><span class="badge" style="background:#e8f5e9;color:#1b5e20">M-Pesa</span></td>
                        <td class="td-muted">TXN98765432</td>
                        <td class="td-muted">15 Jan 2024</td>
                        <td><span class="badge badge-pending"><span class="badge-dot"></span>Pending</span></td>
                        <td><button class="btn btn-sm btn-success" onclick="showToast('Payment verified!','success')"><i class="fas fa-check"></i> Verify</button></td>
                    </tr>
                    <tr>
                        <td><strong>#PAY-2024-153</strong></td>
                        <td style="color:var(--accent)">#ORD-088</td>
                        <td>Mama Grace Mwita</td>
                        <td><strong>TZS 22,500</strong></td>
                        <td><span class="badge" style="background:#e3f2fd;color:#1565c0">Tigo Pesa</span></td>
                        <td class="td-muted">TXN87654321</td>
                        <td class="td-muted">14 Jan 2024</td>
                        <td><span class="badge badge-paid"><span class="badge-dot"></span>Confirmed</span></td>
                        <td><button class="btn btn-sm btn-outline"><i class="fas fa-receipt"></i> Receipt</button></td>
                    </tr>
                    <tr>
                        <td><strong>#PAY-2024-152</strong></td>
                        <td style="color:var(--accent)">#ORD-087</td>
                        <td>Mwanga SDA Church</td>
                        <td><strong>TZS 340,000</strong></td>
                        <td><span class="badge" style="background:#fef3e2;color:var(--warning)">Airtel Money</span></td>
                        <td class="td-muted">TXN76543210</td>
                        <td class="td-muted">13 Jan 2024</td>
                        <td><span class="badge badge-paid"><span class="badge-dot"></span>Confirmed</span></td>
                        <td><button class="btn btn-sm btn-outline"><i class="fas fa-receipt"></i> Receipt</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Reports & Analytics — Ufunuo Publishing House')
@section('breadcrumb', 'Reports & Analytics')

@section('content')
<div class="view active">
    <div class="page-header">
        <div><div class="page-title">Reports & Analytics</div><div class="page-subtitle">Business intelligence for Ufunuo Publishing House</div></div>
        <div class="page-actions">
            <button class="btn btn-outline"><i class="fas fa-download"></i> Export PDF</button>
            <button class="btn btn-outline"><i class="fas fa-file-csv"></i> Export CSV</button>
        </div>
    </div>
    <div class="tabs">
        <button class="tab-btn active" onclick="setActiveTab(this)"><i class="fas fa-chart-bar"></i> Sales Report</button>
        <button class="tab-btn" onclick="setActiveTab(this)"><i class="fas fa-boxes"></i> Inventory Report</button>
        <button class="tab-btn" onclick="setActiveTab(this)"><i class="fas fa-truck"></i> Delivery Report</button>
        <button class="tab-btn" onclick="setActiveTab(this)"><i class="fas fa-money-bill"></i> Payment Report</button>
    </div>
    <div class="grid-2">
        <div class="card">
            <div class="card-header"><div class="card-title">Top Selling Books</div><div class="card-subtitle">By quantity sold — Jan 2024</div></div>
            <div class="card-body">
                <div style="display:flex;flex-direction:column;gap:14px">
                    <div><div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="font-size:13px;font-weight:700">Holy Bible (Swahili)</span><span style="font-size:13px;font-weight:800;color:var(--accent)">642 sold</span></div><div class="progress-bar-wrap"><div class="progress-bar" style="width:90%"></div></div></div>
                    <div><div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="font-size:13px;font-weight:700">Sabbath School Quarterly</span><span style="font-size:13px;font-weight:800;color:var(--accent)">381 sold</span></div><div class="progress-bar-wrap"><div class="progress-bar green" style="width:60%"></div></div></div>
                    <div><div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="font-size:13px;font-weight:700">Steps to Christ</span><span style="font-size:13px;font-weight:800;color:var(--accent)">245 sold</span></div><div class="progress-bar-wrap"><div class="progress-bar amber" style="width:40%"></div></div></div>
                    <div><div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="font-size:13px;font-weight:700">The Great Controversy</span><span style="font-size:13px;font-weight:800;color:var(--accent)">188 sold</span></div><div class="progress-bar-wrap"><div class="progress-bar" style="width:30%;background:#7c5cbf"></div></div></div>
                    <div><div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="font-size:13px;font-weight:700">Desire of Ages</span><span style="font-size:13px;font-weight:800;color:var(--accent)">120 sold</span></div><div class="progress-bar-wrap"><div class="progress-bar red" style="width:20%"></div></div></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><div class="card-title">Revenue by Region</div><div class="card-subtitle">Jan 2024 breakdown</div></div>
            <div class="card-body">
                <div style="display:flex;flex-direction:column;gap:12px">
                    <div style="display:flex;align-items:center;gap:12px">
                        <div style="width:100px;font-size:13px;font-weight:700;flex-shrink:0">Dar es Salaam</div>
                        <div style="flex:1"><div class="progress-bar-wrap"><div class="progress-bar" style="width:75%"></div></div></div>
                        <div style="font-size:13px;font-weight:800;width:70px;text-align:right">TZS 1.8M</div>
                    </div>
                    <div style="display:flex;align-items:center;gap:12px">
                        <div style="width:100px;font-size:13px;font-weight:700;flex-shrink:0">Arusha</div>
                        <div style="flex:1"><div class="progress-bar-wrap"><div class="progress-bar green" style="width:55%"></div></div></div>
                        <div style="font-size:13px;font-weight:800;width:70px;text-align:right">TZS 1.1M</div>
                    </div>
                    <div style="display:flex;align-items:center;gap:12px">
                        <div style="width:100px;font-size:13px;font-weight:700;flex-shrink:0">Mwanza</div>
                        <div style="flex:1"><div class="progress-bar-wrap"><div class="progress-bar amber" style="width:40%"></div></div></div>
                        <div style="font-size:13px;font-weight:800;width:70px;text-align:right">TZS 820K</div>
                    </div>
                    <div style="display:flex;align-items:center;gap:12px">
                        <div style="width:100px;font-size:13px;font-weight:700;flex-shrink:0">Mbeya</div>
                        <div style="flex:1"><div class="progress-bar-wrap"><div class="progress-bar" style="width:20%;background:#7c5cbf"></div></div></div>
                        <div style="font-size:13px;font-weight:800;width:70px;text-align:right">TZS 340K</div>
                    </div>
                    <div style="display:flex;align-items:center;gap:12px">
                        <div style="width:100px;font-size:13px;font-weight:700;flex-shrink:0">Dodoma</div>
                        <div style="flex:1"><div class="progress-bar-wrap"><div class="progress-bar red" style="width:12%"></div></div></div>
                        <div style="font-size:13px;font-weight:800;width:70px;text-align:right">TZS 180K</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Transport Companies — Ufunuo Publishing House')
@section('breadcrumb', 'Transport Companies')

@section('content')
<div class="view active">
    <div class="page-header">
        <div><div class="page-title">Transport Companies</div><div class="page-subtitle">Manage delivery partners and their assignments</div></div>
        <button class="btn btn-primary" onclick="showToast('Add company form coming soon!','info')"><i class="fas fa-plus"></i> Add Company</button>
    </div>
    <div class="grid-3">
        <div class="card">
            <div class="card-body" style="text-align:center;padding:24px">
                <div style="font-size:36px;margin-bottom:12px">🚌</div>
                <div style="font-size:16px;font-weight:800;margin-bottom:4px">Dar Express Bus Co.</div>
                <div class="td-muted" style="font-size:12.5px;margin-bottom:14px">Dar es Salaam · Mwanza · Arusha Route</div>
                <div style="display:flex;justify-content:center;gap:16px;margin-bottom:14px">
                    <div style="text-align:center"><div style="font-size:20px;font-weight:900;color:var(--accent)">24</div><div style="font-size:11px;color:var(--text-muted)">Active</div></div>
                    <div style="text-align:center"><div style="font-size:20px;font-weight:900;color:var(--success)">189</div><div style="font-size:11px;color:var(--text-muted)">Completed</div></div>
                </div>
                <span class="badge badge-success">Active Partner</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="text-align:center;padding:24px">
                <div style="font-size:36px;margin-bottom:12px">🚐</div>
                <div style="font-size:16px;font-weight:800;margin-bottom:4px">Sumry Transport</div>
                <div class="td-muted" style="font-size:12.5px;margin-bottom:14px">Dar es Salaam · Mwanza Route</div>
                <div style="display:flex;justify-content:center;gap:16px;margin-bottom:14px">
                    <div style="text-align:center"><div style="font-size:20px;font-weight:900;color:var(--accent)">8</div><div style="font-size:11px;color:var(--text-muted)">Active</div></div>
                    <div style="text-align:center"><div style="font-size:20px;font-weight:900;color:var(--success)">95</div><div style="font-size:11px;color:var(--text-muted)">Completed</div></div>
                </div>
                <span class="badge badge-success">Active Partner</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="text-align:center;padding:24px">
                <div style="font-size:36px;margin-bottom:12px">🏔️</div>
                <div style="font-size:16px;font-weight:800;margin-bottom:4px">Kilimanjaro Express</div>
                <div class="td-muted" style="font-size:12.5px;margin-bottom:14px">Dar es Salaam · Moshi · Arusha</div>
                <div style="display:flex;justify-content:center;gap:16px;margin-bottom:14px">
                    <div style="text-align:center"><div style="font-size:20px;font-weight:900;color:var(--accent)">6</div><div style="font-size:11px;color:var(--text-muted)">Active</div></div>
                    <div style="text-align:center"><div style="font-size:20px;font-weight:900;color:var(--success)">72</div><div style="font-size:11px;color:var(--text-muted)">Completed</div></div>
                </div>
                <span class="badge badge-success">Active Partner</span>
            </div>
        </div>
    </div>
</div>
@endsection

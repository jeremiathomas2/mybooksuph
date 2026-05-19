@extends('layouts.app')

@section('title', 'Church Agents — Ufunuo Publishing House')
@section('breadcrumb', 'Church Agents')

@section('content')
<div class="view active">
    <div class="page-header">
        <div><div class="page-title">Church Agents</div><div class="page-subtitle">Registered church representatives and order agents</div></div>
        <button class="btn btn-primary" onclick="showToast('Add agent form!','info')"><i class="fas fa-plus"></i> Add Agent</button>
    </div>
    <div class="card">
        <div class="table-wrap">
            <table>
                <thead><tr><th>Agent</th><th>Church</th><th>Region</th><th>Total Orders</th><th>Total Spend</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody>
                    <tr><td><div style="font-weight:700">Br. Emmanuel Kimaro</div><div class="td-muted">+255 754 123 456</div></td><td>Bethel SDA Church</td><td>Dar es Salaam</td><td>24</td><td>TZS 1.2M</td><td><span class="badge badge-success">Active</span></td><td><div style="display:flex;gap:6px"><button class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></button><button class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></button></div></td></tr>
                    <tr><td><div style="font-weight:700">Sis. Amina Hassan</div><div class="td-muted">+255 715 654 321</div></td><td>Mwanga SDA Church</td><td>Arusha</td><td>18</td><td>TZS 890K</td><td><span class="badge badge-success">Active</span></td><td><div style="display:flex;gap:6px"><button class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></button><button class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></button></div></td></tr>
                    <tr><td><div style="font-weight:700">Br. Joseph Mwakalinga</div><div class="td-muted">+255 686 789 012</div></td><td>Omega Church</td><td>Mwanza</td><td>31</td><td>TZS 2.1M</td><td><span class="badge badge-success">Active</span></td><td><div style="display:flex;gap:6px"><button class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></button><button class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></button></div></td></tr>
                    <tr><td><div style="font-weight:700">Sis. Grace Mollel</div><div class="td-muted">+255 762 345 678</div></td><td>Grace Chapel</td><td>Mbeya</td><td>9</td><td>TZS 340K</td><td><span class="badge badge-warning">Inactive</span></td><td><div style="display:flex;gap:6px"><button class="btn btn-sm btn-outline"><i class="fas fa-eye"></i></button><button class="btn btn-sm btn-outline"><i class="fas fa-edit"></i></button></div></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

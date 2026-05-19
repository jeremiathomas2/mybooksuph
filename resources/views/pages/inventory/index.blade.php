@extends('layouts.app')

@section('title', 'Inventory Management — Ufunuo Publishing House')
@section('breadcrumb', 'Inventory Management')

@section('content')
<div class="view active">
    <div class="page-header">
        <div><div class="page-title">Inventory Management</div><div class="page-subtitle">Monitor and manage book stock levels</div></div>
        <button class="btn btn-primary" onclick="showToast('Restock order placed!','success')"><i class="fas fa-plus-circle"></i> Restock Order</button>
    </div>
    <div class="stats-grid" style="grid-template-columns:repeat(4,1fr);margin-bottom:20px">
        <div class="stat-card"><div class="stat-icon green"><i class="fas fa-check-circle"></i></div><div class="stat-info"><div class="stat-value">118</div><div class="stat-label">Well Stocked</div></div></div>
        <div class="stat-card"><div class="stat-icon amber"><i class="fas fa-exclamation-triangle"></i></div><div class="stat-info"><div class="stat-value">12</div><div class="stat-label">Low Stock (≤30)</div></div></div>
        <div class="stat-card"><div class="stat-icon red"><i class="fas fa-times-circle"></i></div><div class="stat-info"><div class="stat-value">4</div><div class="stat-label">Critical (≤10)</div></div></div>
        <div class="stat-card"><div class="stat-icon blue"><i class="fas fa-boxes"></i></div><div class="stat-info"><div class="stat-value">8,450</div><div class="stat-label">Total Books</div></div></div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Stock Levels</div>
            <div class="search-input-wrap">
                <i class="fas fa-search search-icon"></i>
                <input class="search-input" placeholder="Search books..." type="text">
            </div>
        </div>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Book Title</th><th>Category</th><th>In Stock</th><th>Reserved</th><th>Available</th><th>Stock Level</th><th>Actions</th></tr></thead>
                <tbody>
                    <tr>
                        <td><strong>Holy Bible (Swahili)</strong></td>
                        <td><span class="badge badge-info">Bible</span></td>
                        <td>320</td><td>45</td><td>275</td>
                        <td style="width:150px"><div class="progress-bar-wrap"><div class="progress-bar" style="width:88%"></div></div></td>
                        <td><button class="btn btn-sm btn-outline"><i class="fas fa-edit"></i> Update</button></td>
                    </tr>
                    <tr>
                        <td><strong>Sabbath School Quarterly</strong></td>
                        <td><span class="badge badge-success">Lesson</span></td>
                        <td>245</td><td>60</td><td>185</td>
                        <td><div class="progress-bar-wrap"><div class="progress-bar green" style="width:65%"></div></div></td>
                        <td><button class="btn btn-sm btn-outline"><i class="fas fa-edit"></i> Update</button></td>
                    </tr>
                    <tr>
                        <td><strong>Steps to Christ (Swahili)</strong></td>
                        <td><span class="badge badge-warning">Adventist</span></td>
                        <td>22</td><td>5</td><td>17</td>
                        <td><div class="progress-bar-wrap"><div class="progress-bar amber" style="width:18%"></div></div></td>
                        <td><button class="btn btn-sm btn-warning" onclick="showToast('Restock initiated!','success')"><i class="fas fa-plus"></i> Restock</button></td>
                    </tr>
                    <tr>
                        <td><strong>Daily Devotional 2024</strong></td>
                        <td><span class="badge badge-info">Adventist</span></td>
                        <td>5</td><td>2</td><td>3</td>
                        <td><div class="progress-bar-wrap"><div class="progress-bar red" style="width:5%"></div></div></td>
                        <td><button class="btn btn-sm btn-danger" onclick="showToast('Urgent restock alert sent!','danger')"><i class="fas fa-exclamation"></i> Urgent</button></td>
                    </tr>
                    <tr>
                        <td><strong>Children's Bible Stories</strong></td>
                        <td><span class="badge" style="background:#f0ebff;color:#7c5cbf">Children</span></td>
                        <td>9</td><td>3</td><td>6</td>
                        <td><div class="progress-bar-wrap"><div class="progress-bar red" style="width:8%"></div></div></td>
                        <td><button class="btn btn-sm btn-danger" onclick="showToast('Urgent restock alert sent!','danger')"><i class="fas fa-exclamation"></i> Urgent</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

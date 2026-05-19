@extends('layouts.app')

@section('title', 'My Profile — Ufunuo Publishing House')
@section('breadcrumb', 'My Profile')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">My Profile</div>
            <div class="page-subtitle">View and manage your personal information</div>
        </div>
    </div>

    <div class="grid-2">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Personal Information</div>
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                    <div class="user-avatar" style="width: 80px; height: 80px; font-size: 32px;">
                        {{ substr(auth()->user()->name, 0, 2) }}
                    </div>
                    <div>
                        <h2 style="margin: 0; font-size: 24px;">{{ auth()->user()->name }}</h2>
                        <p style="margin: 5px 0 0; color: var(--text-muted);">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <div style="display: grid; gap: 20px;">
                    <div>
                        <label class="form-label">Full Name</label>
                        <div style="padding: 10px; background: var(--bg); border-radius: 8px;">{{ auth()->user()->name }}</div>
                    </div>
                    <div>
                        <label class="form-label">Email Address</label>
                        <div style="padding: 10px; background: var(--bg); border-radius: 8px;">{{ auth()->user()->email }}</div>
                    </div>
                    <div>
                        <label class="form-label">Role</label>
                        <div style="padding: 10px; background: var(--bg); border-radius: 8px;">Administrator</div>
                    </div>
                    <div>
                        <label class="form-label">Joined Date</label>
                        <div style="padding: 10px; background: var(--bg); border-radius: 8px;">{{ auth()->user()->created_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Account Statistics</div>
            </div>
            <div class="card-body">
                <div class="stats-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-card">
                        <div class="stat-icon blue"><i class="fas fa-shopping-cart"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">124</div>
                            <div class="stat-label">Orders Processed</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">98%</div>
                            <div class="stat-label">Success Rate</div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px;">
                    <h3 style="font-size: 16px; margin-bottom: 15px;">Recent Activity</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker">
                                <div class="timeline-dot" style="background: var(--accent); color: #fff;"><i class="fas fa-plus"></i></div>
                                <div class="timeline-line"></div>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Added new book "Hatua za Kristo"</div>
                                <div class="timeline-meta">2 hours ago</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker">
                                <div class="timeline-dot" style="background: var(--success); color: #fff;"><i class="fas fa-check"></i></div>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Confirmed payment for Order #ORD-089</div>
                                <div class="timeline-meta">Yesterday at 4:30 PM</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

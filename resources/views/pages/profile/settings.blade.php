@extends('layouts.app')

@section('title', 'Account Settings — Ufunuo Publishing House')
@section('breadcrumb', 'Account Settings')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">Account Settings</div>
            <div class="page-subtitle">Update your password and account preferences</div>
        </div>
    </div>

    <div class="card" style="max-width: 800px;">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div style="margin-bottom: 30px;">
                    <h3 style="font-size: 16px; margin-bottom: 20px; color: var(--accent); border-bottom: 2px solid var(--accent-light); padding-bottom: 10px;">
                        <i class="fas fa-user-edit" style="margin-right: 10px;"></i>Basic Information
                    </h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <h3 style="font-size: 16px; margin-bottom: 20px; color: var(--accent); border-bottom: 2px solid var(--accent-light); padding-bottom: 10px;">
                        <i class="fas fa-lock" style="margin-right: 10px;"></i>Change Password
                    </h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <!-- Spacer -->
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <h3 style="font-size: 16px; margin-bottom: 20px; color: var(--accent); border-bottom: 2px solid var(--accent-light); padding-bottom: 10px;">
                        <i class="fas fa-bell" style="margin-right: 10px;"></i>Notification Preferences
                    </h3>
                    <div style="display: grid; gap: 15px;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <div style="font-weight: 700; font-size: 14px;">Email Notifications</div>
                                <div style="font-size: 12px; color: var(--text-muted);">Receive emails about new orders and reports</div>
                            </div>
                            <button type="button" class="toggle on" onclick="this.classList.toggle('on')"></button>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <div style="font-weight: 700; font-size: 14px;">Stock Alerts</div>
                                <div style="font-size: 12px; color: var(--text-muted);">Get notified when books are low in stock</div>
                            </div>
                            <button type="button" class="toggle on" onclick="this.classList.toggle('on')"></button>
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 15px; border-top: 1px solid var(--border); padding-top: 20px;">
                    <button type="button" class="btn btn-outline">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save" style="margin-right: 8px;"></i>Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

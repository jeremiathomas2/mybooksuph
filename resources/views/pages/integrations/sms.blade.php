@extends('layouts.app')

@section('title', 'SMS & Email Integration — Ufunuo Publishing House')
@section('breadcrumb', 'SMS & Email Integration')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">SMS & Email Integration</div>
            <div class="page-subtitle">Configure communication gateways for the entire system</div>
        </div>
    </div>

    <div class="grid-2">
        <!-- SMS Configuration -->
        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-sms" style="margin-right: 10px;"></i>SMS Gateway (NextSMS / Beem)</div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div style="display: grid; gap: 20px;">
                        <div class="form-group">
                            <label class="form-label">API Key</label>
                            <input type="text" name="sms_api_key" class="form-control" value="{{ \App\Models\Setting::get('sms_api_key', 'nxt_abc123xyz') }}" placeholder="Enter API Key">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sender ID</label>
                            <input type="text" name="sms_sender_id" class="form-control" value="{{ \App\Models\Setting::get('sms_sender_id', 'UFUNUO') }}" placeholder="e.g. UFUNUO">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 100%;">Save SMS Settings</button>
                </form>
            </div>
        </div>

        <!-- Email Configuration -->
        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-envelope" style="margin-right: 10px;"></i>Email SMTP Configuration</div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div style="display: grid; gap: 20px;">
                        <div class="form-group">
                            <label class="form-label">SMTP Host</label>
                            <input type="text" name="smtp_host" class="form-control" value="{{ \App\Models\Setting::get('smtp_host', 'smtp.gmail.com') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">SMTP Port</label>
                            <input type="text" name="smtp_port" class="form-control" value="{{ \App\Models\Setting::get('smtp_port', '587') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="smtp_user" class="form-control" value="{{ \App\Models\Setting::get('smtp_user', 'notifications@ufunuo.co.tz') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="smtp_pass" class="form-control" value="{{ \App\Models\Setting::get('smtp_pass', '••••••••••••••••') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 100%;">Update Email Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

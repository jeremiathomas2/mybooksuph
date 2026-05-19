@extends('layouts.app')

@section('title', 'Payment Integration — Ufunuo Publishing House')
@section('breadcrumb', 'Payment Integration')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">Payment Integration</div>
            <div class="page-subtitle">Configure mobile money and bank payment gateways</div>
        </div>
    </div>

    <div class="grid-2">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-mobile-alt" style="margin-right: 10px;"></i>Mobile Money (M-Pesa / Tigo Pesa)</div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div style="display: grid; gap: 20px;">
                        <div class="form-group">
                            <label class="form-label">API Key / Shortcode</label>
                            <input type="text" name="mobile_money_shortcode" class="form-control" value="{{ \App\Models\Setting::get('mobile_money_shortcode', '123456') }}" placeholder="Enter Shortcode">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Secret Key</label>
                            <input type="password" name="mobile_money_secret" class="form-control" value="{{ \App\Models\Setting::get('mobile_money_secret', '••••••••••••••••') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Environment</label>
                            <select name="mobile_money_env" class="form-control">
                                <option value="sandbox" {{ \App\Models\Setting::get('mobile_money_env') == 'sandbox' ? 'selected' : '' }}>Sandbox (Testing)</option>
                                <option value="production" {{ \App\Models\Setting::get('mobile_money_env') == 'production' ? 'selected' : '' }}>Production (Live)</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 100%;">Save Configuration</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title"><i class="fas fa-university" style="margin-right: 10px;"></i>Bank Transfer Settings</div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div style="display: grid; gap: 20px;">
                        <div class="form-group">
                            <label class="form-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" value="{{ \App\Models\Setting::get('bank_name', 'CRDB Bank') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Account Number</label>
                            <input type="text" name="bank_account_number" class="form-control" value="{{ \App\Models\Setting::get('bank_account_number', '01J1234567890') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Account Name</label>
                            <input type="text" name="bank_account_name" class="form-control" value="{{ \App\Models\Setting::get('bank_account_name', 'Ufunuo Publishing House') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 100%;">Update Bank Details</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

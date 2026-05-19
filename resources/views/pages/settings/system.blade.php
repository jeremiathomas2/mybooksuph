@extends('layouts.app')

@section('title', 'System Settings — Ufunuo Publishing House')
@section('breadcrumb', 'System Settings')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">System Settings</div>
            <div class="page-subtitle">Manage global configuration and system maintenance</div>
        </div>
        <div class="page-actions">
            <button class="btn btn-warning" onclick="showToast('Starting system diagnostic...','info')"><i class="fas fa-stethoscope"></i> Diagnostic</button>
            <button class="btn btn-danger" onclick="confirm('Clear system cache?') && showToast('Cache cleared!','success')"><i class="fas fa-trash"></i> Clear Cache</button>
        </div>
    </div>

    <div class="grid-2">
        <div class="card">
            <div class="card-header">
                <div class="card-title">General Configuration</div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div style="display: grid; gap: 20px;">
                        <div class="form-group">
                            <label class="form-label">System Name</label>
                            <input type="text" name="system_name" class="form-control" value="{{ \App\Models\Setting::get('system_name', 'Ufunuo Publishing House DMS') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" class="form-control" value="{{ \App\Models\Setting::get('contact_email', 'support@ufunuo.co.tz') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Timezone</label>
                            <select name="timezone" class="form-control">
                                <option value="Africa/Dar_es_Salaam" {{ \App\Models\Setting::get('timezone') == 'Africa/Dar_es_Salaam' ? 'selected' : '' }}>Africa/Dar_es_Salaam</option>
                                <option value="UTC" {{ \App\Models\Setting::get('timezone') == 'UTC' ? 'selected' : '' }}>UTC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Currency Symbol</label>
                            <input type="text" name="currency_symbol" class="form-control" value="{{ \App\Models\Setting::get('currency_symbol', 'TZS') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 100%;">Save Global Settings</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Database Backup</div>
                <button class="btn btn-sm btn-primary" onclick="showToast('Generating new backup...','info')"><i class="fas fa-download"></i> New Backup</button>
            </div>
            <div class="card-body">
                <div style="background: var(--bg); border-radius: var(--radius-sm); padding: 15px; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <div style="font-weight: 700; font-size: 14px;">Automatic Backups</div>
                            <div style="font-size: 12px; color: var(--text-muted);">Schedule daily system backups to cloud</div>
                        </div>
                        <button type="button" class="toggle on"></button>
                    </div>
                </div>

                <h3 style="font-size: 14px; margin-bottom: 15px;">Recent Backups</h3>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Filename</th>
                                <th>Size</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-file-archive" style="margin-right: 8px; color: var(--accent);"></i> backup_2024_01_18.sql</td>
                                <td>24.5 MB</td>
                                <td class="td-muted">Today, 04:00 AM</td>
                                <td><button class="btn btn-sm btn-outline btn-icon"><i class="fas fa-download"></i></button></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-file-archive" style="margin-right: 8px; color: var(--accent);"></i> backup_2024_01_17.sql</td>
                                <td>24.2 MB</td>
                                <td class="td-muted">Yesterday, 04:00 AM</td>
                                <td><button class="btn btn-sm btn-outline btn-icon"><i class="fas fa-download"></i></button></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-file-archive" style="margin-right: 8px; color: var(--accent);"></i> backup_2024_01_16.sql</td>
                                <td>23.8 MB</td>
                                <td class="td-muted">2 days ago</td>
                                <td><button class="btn btn-sm btn-outline btn-icon"><i class="fas fa-download"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

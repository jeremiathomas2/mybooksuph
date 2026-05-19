@extends('layouts.app')

@section('title', 'Orders Management — Ufunuo Publishing House')
@section('breadcrumb', 'Orders Management')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">Orders Management</div>
            <div class="page-subtitle">Track and manage all customer orders</div>
        </div>
        <div class="page-actions">
            <button class="btn btn-outline"><i class="fas fa-file-csv"></i> Export CSV</button>
            <button class="btn btn-primary" onclick="openModal('orderModal')"><i class="fas fa-plus"></i> New Order</button>
        </div>
    </div>
    <div class="card" style="margin-bottom:16px">
        <div class="card-body" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
            <div class="search-input-wrap">
                <i class="fas fa-search search-icon"></i>
                <input class="search-input" placeholder="Search orders..." type="text">
            </div>
            <div class="filter-chips">
                <div class="filter-chip active">All</div>
                <div class="filter-chip">Pending</div>
                <div class="filter-chip">Paid</div>
                <div class="filter-chip">Packed</div>
                <div class="filter-chip">Dispatched</div>
                <div class="filter-chip">Delivered</div>
            </div>
            <input type="date" class="form-control" style="width:auto;padding:7px 10px" value="2024-01-15">
        </div>
    </div>
    <div class="card">
        <div class="table-wrap">
            <table id="ordersTable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Type</th>
                        <th>Books</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td><strong style="color:var(--accent)">#{{ $order->order_number }}</strong></td>
                        <td><div style="font-weight:700">{{ $order->customer->name ?? 'Unknown' }}</div><div class="td-muted">{{ $order->delivery_region }}</div></td>
                        <td><span class="badge {{ $order->customer_type == 'Agent' ? 'badge-info' : 'badge-warning' }}">{{ $order->customer_type }}</span></td>
                        <td>Various Books</td>
                        <td><strong>TZS {{ number_format($order->total_amount) }}</strong></td>
                        <td>{{ $order->payment_method }}</td>
                        <td><span class="badge badge-pending"><span class="badge-dot"></span>{{ $order->status }}</span></td>
                        <td class="td-muted">{{ $order->created_at->format('d M Y') }}</td>
                        <td>
                            <div style="display:flex;gap:6px">
                                <button class="btn btn-sm btn-outline btn-icon" onclick="viewOrder({{ $order->id }})"><i class="fas fa-eye"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 40px;">
                            <div class="empty-state">
                                <div class="empty-state-icon"><i class="fas fa-shopping-cart"></i></div>
                                <div class="empty-state-title">No orders found</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Order Modal -->
    <div class="modal-overlay" id="viewOrderModal">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-header-icon" style="background:#e8f2fc;color:var(--accent)"><i class="fas fa-eye"></i></div>
                <div class="modal-title">Order Details</div>
                <button class="modal-close" onclick="closeModal('viewOrderModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body" id="orderDetailContent">
                <!-- Dynamic Content -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('viewOrderModal')">Close</button>
                <button class="btn btn-primary"><i class="fas fa-print"></i> Print Invoice</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function viewOrder(id) {
        fetch(`/orders/${id}`)
            .then(response => response.json())
            .then(order => {
                const content = `
                    <div style="display: grid; gap: 20px;">
                        <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 15px;">
                            <div>
                                <div style="font-size: 12px; color: var(--text-muted);">Order Number</div>
                                <div style="font-weight: 800; font-size: 18px; color: var(--accent);">#${order.order_number}</div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 12px; color: var(--text-muted);">Status</div>
                                <span class="badge badge-pending">${order.status}</span>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <div class="form-label">Customer</div>
                                <div style="font-weight: 700;">${order.customer ? order.customer.name : 'Unknown'}</div>
                                <div style="font-size: 12px; color: var(--text-muted);">${order.customer_type}</div>
                            </div>
                            <div>
                                <div class="form-label">Payment Method</div>
                                <div style="font-weight: 700;">${order.payment_method}</div>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <div class="form-label">Total Amount</div>
                                <div style="font-weight: 800; font-size: 16px; color: var(--success);">TZS ${new Intl.NumberFormat().format(order.total_amount)}</div>
                            </div>
                            <div>
                                <div class="form-label">Delivery Region</div>
                                <div style="font-weight: 700;">${order.delivery_region}</div>
                            </div>
                        </div>
                        <div>
                            <div class="form-label">Address / Notes</div>
                            <div style="padding: 10px; background: var(--bg); border-radius: 8px; font-size: 13px;">${order.address_notes || 'No notes provided'}</div>
                        </div>
                    </div>
                `;
                document.getElementById('orderDetailContent').innerHTML = content;
                openModal('viewOrderModal');
            });
    }

    // Real-time search for orders
    const searchInput = document.querySelector('input[placeholder="Search orders..."]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value;
            fetch(`/orders?search=${query}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newTable = doc.getElementById('ordersTable').innerHTML;
                document.getElementById('ordersTable').innerHTML = newTable;
            });
        });
    }
</script>
@endpush

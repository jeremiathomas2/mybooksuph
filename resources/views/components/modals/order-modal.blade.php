<div class="modal-overlay" id="orderModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-header-icon" style="background:#e8f2fc;color:var(--accent)"><i class="fas fa-plus"></i></div>
      <div class="modal-title">New Order</div>
      <button class="modal-close" onclick="closeModal('orderModal')"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body">
      <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
        @csrf
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label">Customer / Church Name</label>
            <input name="customer_name" class="form-control" placeholder="e.g. Bethel SDA Church" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-label">Customer Type</label>
            <select name="customer_type" class="form-control" required>
              <option value="Agent">Church Agent</option>
              <option value="Buyer">Individual Buyer</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Book Title</label>
            <select name="book_id" class="form-control">
                <option value="">Select a book</option>
                <!-- In a real app, this would be populated from DB -->
                <option value="1">Holy Bible (Swahili)</option>
                <option value="2">Sabbath School Quarterly</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Total Amount (TZS)</label>
            <input name="total_amount" class="form-control" placeholder="e.g. 50000" type="number" required>
          </div>
          <div class="form-group">
            <label class="form-label">Payment Method</label>
            <select name="payment_method" class="form-control" required>
              <option>M-Pesa</option>
              <option>Tigo Pesa</option>
              <option>Airtel Money</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Delivery Region</label>
            <select name="delivery_region" class="form-control" required>
              <option>Dar es Salaam</option>
              <option>Mwanza</option>
              <option>Arusha</option>
              <option>Dodoma</option>
              <option>Mbeya</option>
            </select>
          </div>
          <div class="form-group full">
            <label class="form-label">Delivery Address / Notes</label>
            <textarea name="address_notes" class="form-control" placeholder="Full delivery address..."></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('orderModal')">Cancel</button>
      <button class="btn btn-primary" type="submit" form="orderForm"><i class="fas fa-check"></i> Place Order</button>
    </div>
  </div>
</div>

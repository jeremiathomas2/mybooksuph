<div class="modal-overlay" id="bookModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-header-icon" style="background:#e8f8ef;color:var(--success)"><i class="fas fa-book"></i></div>
      <div class="modal-title">Add New Book</div>
      <button class="modal-close" onclick="closeModal('bookModal')"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body">
      <form action="{{ route('books.store') }}" method="POST" id="bookForm">
        @csrf
        <div class="form-grid">
          <div class="form-group full">
            <label class="form-label">Book Title</label>
            <input name="title" class="form-control" placeholder="Enter book title" type="text" required>
          </div>
          <div class="form-group">
            <label class="form-label">Category</label>
            <select name="category" class="form-control" required>
              <option>Bibles</option>
              <option>Lesson Books</option>
              <option>Adventist Publications</option>
              <option>Other Christian Literature</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Price (TZS)</label>
            <input name="price" class="form-control" placeholder="e.g. 15000" type="number" required>
          </div>
          <div class="form-group">
            <label class="form-label">Stock Quantity</label>
            <input name="stock" class="form-control" placeholder="e.g. 100" type="number" required>
          </div>
          <div class="form-group">
            <label class="form-label">Language</label>
            <select name="language" class="form-control" required>
              <option>Swahili</option>
              <option>English</option>
              <option>Bilingual</option>
            </select>
          </div>
          <div class="form-group full">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Short description of the book..."></textarea>
          </div>
          <div class="form-group full">
            <label class="form-label">Cover Image URL</label>
            <input name="cover_image_url" class="form-control" placeholder="https://..." type="url">
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('bookModal')">Cancel</button>
      <button class="btn btn-success" type="submit" form="bookForm"><i class="fas fa-plus"></i> Add Book</button>
    </div>
  </div>
</div>

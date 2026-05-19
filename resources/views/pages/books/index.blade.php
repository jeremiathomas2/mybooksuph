@extends('layouts.app')

@section('title', 'Book Catalog — Ufunuo Publishing House')
@section('breadcrumb', 'Book Catalog')

@section('content')
<div class="view active">
    <div class="page-header">
        <div>
            <div class="page-title">Book Catalog</div>
            <div class="page-subtitle">Manage all book titles and inventory</div>
        </div>
        <div class="page-actions">
            <button class="btn btn-outline"><i class="fas fa-file-export"></i> Export</button>
            <button class="btn btn-primary" onclick="openModal('bookModal')"><i class="fas fa-plus"></i> Add Book</button>
        </div>
    </div>
    <div class="card" style="margin-bottom:20px">
        <div class="card-body" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
            <form action="{{ route('books.index') }}" method="GET" class="search-input-wrap">
                <i class="fas fa-search search-icon"></i>
                <input name="search" class="search-input" placeholder="Search books..." type="text" value="{{ request('search') }}">
            </form>
            <div class="filter-chips">
                <div class="filter-chip active">All Categories</div>
                <div class="filter-chip">Bibles</div>
                <div class="filter-chip">Lesson Books</div>
                <div class="filter-chip">Adventist Pubs</div>
                <div class="filter-chip">Christian Lit</div>
            </div>
            <div style="margin-left:auto;display:flex;gap:8px">
                <button class="btn btn-sm btn-outline"><i class="fas fa-th"></i> Grid</button>
                <button class="btn btn-sm btn-outline"><i class="fas fa-list"></i> List</button>
            </div>
        </div>
    </div>
    <div class="grid-auto" id="booksGrid">
        @forelse($books as $book)
        <div class="book-card">
            <div class="book-cover {{ $book->stock > 0 ? 'book-cover-blue' : 'book-cover-red' }}">
                @if($book->cover_image_url)
                    <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    <span>📖</span>
                @endif
            </div>
            <div class="book-card-body">
                <div class="book-category">{{ $book->category }}</div>
                <div class="book-title">{{ $book->title }}</div>
                <div class="book-meta">
                    <div class="book-price">TZS {{ number_format($book->price) }}</div>
                    <div class="book-stock {{ $book->stock <= 10 ? 'low' : '' }}">In Stock: {{ $book->stock }} {{ $book->stock <= 10 ? '⚠️' : '' }}</div>
                </div>
            </div>
            <div class="book-actions">
                <button class="btn btn-sm btn-primary" style="flex:1" onclick="openModal('orderModal')"><i class="fas fa-cart-plus"></i> Order</button>
                <button class="btn btn-sm btn-outline btn-icon" onclick="editBook({{ $book->id }})"><i class="fas fa-edit"></i></button>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline btn-icon" style="color:var(--danger)"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-state-icon"><i class="fas fa-book"></i></div>
            <div class="empty-state-title">No books found</div>
            <div class="empty-state-desc">Start by adding some books to your catalog.</div>
        </div>
        @endforelse
    </div>

    <!-- Edit Book Modal -->
    <div class="modal-overlay" id="editBookModal">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-header-icon" style="background:#e8f2fc;color:var(--accent)"><i class="fas fa-edit"></i></div>
                <div class="modal-title">Edit Book</div>
                <button class="modal-close" onclick="closeModal('editBookModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form id="editBookForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-grid">
                        <div class="form-group full">
                            <label class="form-label">Book Title</label>
                            <input name="title" id="edit_title" class="form-control" type="text" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select name="category" id="edit_category" class="form-control" required>
                                <option>Bibles</option>
                                <option>Lesson Books</option>
                                <option>Adventist Publications</option>
                                <option>Other Christian Literature</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price (TZS)</label>
                            <input name="price" id="edit_price" class="form-control" type="number" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stock Quantity</label>
                            <input name="stock" id="edit_stock" class="form-control" type="number" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Language</label>
                            <select name="language" id="edit_language" class="form-control" required>
                                <option>Swahili</option>
                                <option>English</option>
                                <option>Bilingual</option>
                            </select>
                        </div>
                        <div class="form-group full">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="edit_description" class="form-control"></textarea>
                        </div>
                        <div class="form-group full">
                            <label class="form-label">Cover Image URL</label>
                            <input name="cover_image_url" id="edit_cover_image_url" class="form-control" type="url">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeModal('editBookModal')">Cancel</button>
                <button class="btn btn-primary" type="submit" form="editBookForm"><i class="fas fa-save"></i> Update Book</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function editBook(id) {
        fetch(`/books/${id}/edit`)
            .then(response => response.json())
            .then(book => {
                document.getElementById('editBookForm').action = `/books/${id}`;
                document.getElementById('edit_title').value = book.title;
                document.getElementById('edit_category').value = book.category;
                document.getElementById('edit_price').value = book.price;
                document.getElementById('edit_stock').value = book.stock;
                document.getElementById('edit_language').value = book.language;
                document.getElementById('edit_description').value = book.description || '';
                document.getElementById('edit_cover_image_url').value = book.cover_image_url || '';
                openModal('editBookModal');
            });
    }

    // Real-time search
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value;
            fetch(`/books?search=${query}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newGrid = doc.getElementById('booksGrid').innerHTML;
                document.getElementById('booksGrid').innerHTML = newGrid;
            });
        });
    }
</script>
@endpush

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        $books = $query->latest()->get();
        return view('pages.books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'language' => 'required|string',
            'description' => 'nullable|string',
            'cover_image_url' => 'nullable|url',
        ]);

        Book::create($validated);

        return redirect()->back()->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function edit(Book $book)
    {
        return response()->json($book);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'language' => 'required|string',
            'description' => 'nullable|string',
            'cover_image_url' => 'nullable|url',
        ]);

        $book->update($validated);

        return redirect()->back()->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('success', 'Book deleted successfully!');
    }
}

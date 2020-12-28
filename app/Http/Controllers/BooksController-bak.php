<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    protected function createBook(Request $request)
    {
        /*
        $table->id('b_Id');
            $table->char('Title', 100);
            $table->char('Author', 100);
            $table->char('Category', 100);
            $table->char('Description', 1000);
            $table->float('Price', 8, 2)

        */
        $data = [
            'Title' => $request->input('Title'),
            'Author' => $request->input('Author'),
            'Category' => $request->input('Category'),
            'Description' => $request->input('Description'),
            'Price' => $request->input('Price'),
            'Cover' => $request->input('Cover'),
        ];
        $book = Book::create([
            'Title' => $data['Title'],
            'Author' => $data['Author'],
            'Category' => $data['Category'],
            'Description' => $data['Description'],
            'Price' => $data['Price'],
        ]);

        if (isset($data['Cover'])) {
            $request->Cover->store('logos');
        }

        return $book;
    }
}

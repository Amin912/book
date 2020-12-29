<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'Title' => $request->Title,
            'Author' => $request->Author,
            'Category' => $request->Category,
            'Description' => $request->Description,
            'Price' => $request->Price,
        ]);
        $book->addMedia($request->Cover)->toMediaCollection('cover');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $b_id = (int)($id);
        $book = Book::where('b_Id', $b_id)->first();
        
        $id = Media::where('model_id', $b_id)->value('id');
        $name = Media::where('model_id', $b_id)->value('file_name');

        

        $path = 'storage/'.$id.'/'.$name;

        //echo $book->getMedia('cover');
        
        /*
        $data = [
            'Title' => $book->Title,
            'Author' => $book->Author,
            'Category' => $book->Category,
            'Description' => $book->Description,
            'Price' => $book->Price,
        ];
        */
        return view('exampleBook', ['book'=>$book, 'path'=>$path]);
        //return $books = Book::where('b_Id', $b_id)->first()->getMedia('cover');

    }

    public function getCover($id)
    {
        $b_id = (int)($id);
        $book = Book::where('b_Id', $b_id)->first();

        $media = Media::where('model_id', $b_id)->value('id', 'file_name');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

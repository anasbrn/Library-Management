<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Gender;

class BookController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id')->get();

        return response()->json([
            'Books' => BookResource::collection($books)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $gender = Gender::firstOrCreate(['name' => $request->gender]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['gender_id'] = $gender->id;
        
        $book = Book::create($input);

        return response()->json([
            'message' => 'The book has been added successfully',
            'book' => $book,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show ($book)
    {
        $book = Book::find($book);

        if (!$book){
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

      
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Book $book)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($book)
    {
        $book = Book::find($book);

        if (!$book){
            return response()->json([
                'message' => 'book not found'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'The book has been deleted successfully'
        ], 200);

    }
}

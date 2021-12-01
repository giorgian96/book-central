<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookClub;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $bookClubId = auth()->user()->book_club_id;
    $bookClubUserIds = BookClub::find($bookClubId)->users->map(function($item){
      return $item->id;
    });

    // Only return the books of the users from our book club
    return Book::whereIn('user_id', $bookClubUserIds)->get();
  }  

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return Book::find($id);
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
    $book = Book::find($id);
    $book->update($request->all());

    return $book;
  }
}

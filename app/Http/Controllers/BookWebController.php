<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookWebController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $fields = $request->validate([
      'title' => 'required|unique:books',
      'author' => 'required|unique:books',
      'release_date' => 'required'
    ]);

    Book::create([
      'title' => $fields['title'],
      'author' => $fields['author'],
      'release_date' => $fields['release_date'],
      'user_id' => $request->user()->id
    ]);

    return redirect('/add-book')->with('status', 'Book added.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Book::destroy($id);

    return redirect('/dashboard')->with('status', 'Book deleted.');
  }
}

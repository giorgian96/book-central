<?php

namespace App\Http\Controllers;

use App\Models\BookClub;
use App\Models\User;
use Illuminate\Http\Request;

class BookClubController extends Controller
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
      'name' => 'required|unique:book_clubs'
    ]);

    $token = $request->user()->createToken('book_club_token')->plainTextToken;

    $book_club = BookClub::create([
      'name' => $fields['name'],
      'token' => $token
    ]);

    // Add the user to the book club
    $user = User::find($request->user()->id);
    $user->update(['book_club_id' => $book_club->id]);

    return redirect('/dashboard')->with('status', 'Book Club Created.');
  }
}

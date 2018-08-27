<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use Auth;

class profileController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  // public function getProfile($username)
  // {
  //
  //   $user = User::where('name', $username)->first();
  //   $userId = Auth::User()->id;
  //   $status = Status::where('user_id',$username);
  //   if ($status == TRUE) {
  //     $status = Status::all();
  //   }
  //   return view('pages.profile')->withUser($user)->withStatus($status);
  // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;
use App\Like;
use Auth;
use Session;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postStatus(Request $request)
    {
        $this->validate($request, [
          'status' => 'required|max:1000',
        ]);

        Auth::user()->statuses()->create([
          'body' => $request->input('status'),
        ]);

        return redirect()
          ->route('home.forum')
          ->with('info', 'Status Posted');
    }

    public function postReply(Request $request, $statusId)
    {
      $this->validate( $request, [
			'reply-'.$statusId => 'required|max:1000',
		], [
			'required' => 'Enter your reply here',
			'max' => 'Limit of 1000 chars applies!',
		]);

      $status = Status::notReply()->find($statusId);

      if ( ! $status ) {
  			return redirect()->back()->with('info', 'Invalid status, reply cancelled');
  		}

	$reply = $request->input('reply-'.$statusId);

  // create the reply record in the STATUSES table
  Auth::user()->statuses()->create([
    'body' => $reply,
    'parent_id' => $statusId,
  ]);

  return redirect()->back()
    ->with('info', 'Your reply has been posted.');
    }


    public function getLike($statusId)
    {
      $status = Status::find($statusId);

  		if (!$status) {
  			return redirect()->back();
  		}

      if (Auth::user()->hasLikedStatus($status)) {
        return redirect()->back();
      }

      $like = $status->likes()->create([]);
      Auth::user()->likes()->save($like);

      return redirect()->back();
    }

    public function hapusStatus($id)
    {
      $user = Auth::User();
      $userId = $user->id;
      $status = Status::where('id', $id)->where('user_id',$userId);

      if ($status->delete()) {
        Session::flash('success', 'Deleted successfully');
      }else{
      Session::flash('dangerr', 'Deleted not successfully');
    }
      return redirect()->back();
    }
}

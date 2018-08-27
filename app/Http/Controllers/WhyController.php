<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Why;
use Session;

class WhyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function show()
  {
    $whys = Why::all();
    return view('core.why')->withWhys($whys);
  }

  public function store(Request $request)
    {

        $this->validate($request, array(
                'body'  => 'required|min:5|max:255'
            ));

        $post = new Why;

        $post->body = $request->body;

        $post->save();



        Session::flash('success', 'This post was successfully saved.');

        return redirect()->back();
    }

    public function delete($id)
    {
      $post = Why::find($id);
      if ($post->delete()) {
        Session::flash('success', 'Deleted successfully');
      }
      return redirect()->back();
    }
}

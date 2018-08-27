<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advance;
use Session;

class ContentController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function show()
  {
    $advances = Advance::orderBy('created_at', 'desc')
    ->paginate(10);
    return view('core.texts')->withAdvances($advances);
  }

  public function store(Request $request)
    {

        $this->validate($request, array(
                'body'  => 'required'
            ));

        $post = new Advance;

        $post->body = $request->body;

        $post->save();



        Session::flash('success', 'This post was successfully saved.');

        return redirect()->back();
    }

    public function delete($id)
    {
      $post = Advance::find($id);
      if ($post->delete()) {
        Session::flash('success', 'Deleted successfully');
      }
      return redirect()->back();
    }

}

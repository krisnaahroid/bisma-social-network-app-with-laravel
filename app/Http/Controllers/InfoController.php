<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Session;

class InfoController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

    public function show()
    {

      $info = Info::all();
      return view('core.info')->withInfo($info);
    }

    public function storeInfo(Request $request)
    {
        $this->validate($request, [
          'title' => 'required|max:255',
          'body' => 'required'
        ]);

        $info = new Info;

        $info->title = $request->title;
        $info->body = $request->body;

        $info->save();
        Session::flash('create', "Created New Posts Is Successfully");
        return redirect()->back();
    }

    public function delete($id)
    {
      $info = Info::find($id);
      if ($info->delete()) {
        Session::flash('success', 'Deleted successfully');
      }
      return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Image;
use Session;

class GalleryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'description' => 'required|max:255'
    ]);

    $gallery = new Gallery;

    $gallery->description = $request->description;

    if ($request->hasFile('img_galleri')) {
          $image = $request->file('img_galleri');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('gallery/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);

          $gallery->image = $filename;
        }

    $gallery->save();
    Session::flash('create', "Upload to Gallery is Successfully");
    return redirect()->back();
  }

  public function delete($id)
  {
    $galleri = Gallery::find($id);
    if ($galleri->delete()) {
      Session::flash('success', 'Deleted successfully');
    }
    return redirect()->back();
  }

}

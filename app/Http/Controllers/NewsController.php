<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Session;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getBerita()
    {
      $berita = Berita::orderBy('created_at', 'desc')
      ->paginate(10);
      return view('core.new')->withBerita($berita);
    }

    public function storeNews(Request $request)
    {
        $this->validate($request, [
          'title' => 'required|max:255',
          'body' => 'required',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
        ]);

        $news = new Berita;

        $news->title = $request->title;
        $news->body = $request->body;
        $news->slug = $request->slug;

        $news->save();
        Session::flash('create', "Created a News Is Successfully");
        return redirect()->back();
    }

    public function delete($id)
    {
      $berita = Berita::find($id);
      if ($berita->delete()) {
        Session::flash('success', 'Deleted successfully');
      }
      return redirect()->back();
    }
}

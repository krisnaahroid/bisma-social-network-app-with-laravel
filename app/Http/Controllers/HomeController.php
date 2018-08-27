<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Gallery;
use App\Post;
use App\User;
use App\Category;
use Image;
use Session;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
          $statuses =
				Status::notReply()
					->where(
						function($query) {
							return Status::all();
						})
				->orderBy('created_at', 'desc')
				->paginate(10);
          $users = User::all();
          return view('pages.forum')
          ->with('statuses', $statuses)
          ->withUsers($users);
        }

        return view('pages.forum');
    }

    public function upload()
    {
      return view('pages.upload');
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
      return redirect()->route('home.upload');
    }


    public function info()
    {
      $categories = Category::all();
      $posts = Post::orderBy('created_at', 'desc')
      ->paginate(10);
      return view('pages.info')->withPosts($posts)->withCategories($categories);
    }

    public function infoSingle($slug)
    {
        $categories = Category::all();
        $post = Post::where('slug', '=', $slug)->first();

        return view('pages.single')->withPost($post)->withCategories($categories);
      // $post = Post::find($slug);
      // return view('pages.single')->withPost($post);
    }

    public function getCategory($Category_id)
   {

     $category = Category::find($Category_id);
     if($category !== null){
         $posts = $category->posts;
         $categories = Category::all();
         return view('pages.singlecategory',['posts' => $posts])->withCategories($categories);
     }
   }

    //
    // public function getProfile($id)
    // {
    //
    //
    //   return view('pages.profile');
    //
    // }

}

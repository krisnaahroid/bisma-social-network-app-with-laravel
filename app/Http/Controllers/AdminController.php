<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Gallery;
use App\Category;
use App\User;
use Session;

class AdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    return view('core.admin');
  }

  public function buatAkun()
  {
    return view('auth.siswa-register');
  }

  public function newPost()
  {
    $categories = Category::all();
    return view('core.create')->withCategories($categories);
  }


  public function getFaculty()
  {
    $jurusan = Jurusan::all();
    return view('core.jurusan')->withJurusan($jurusan);
  }

  public function hapusFacultys($id)
  {
    $skill = Jurusan::find($id);
    if ($skill->delete()) {
      Session::flash('success', 'Deleted successfully');
    }
    return redirect()->back();
  }

  public function getGallery()
  {
    $galleris = Gallery::all();
    return view('core.gallery')->withGalleris($galleris);
  }

  public function showStudent()
  {
    $users = User::all();
    return view('core.students')->withUsers($users);
  }

  public function studentsDelete($id)
  {
    $user = User::find($id);
    if ($user->delete()) {
      Session::flash('success', 'Deleted successfully');
    }
    return redirect()->back();
  }
  


}

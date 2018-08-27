<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Gallery;
use App\Berita;
use App\Info;
use App\Advance;
use App\Why;

class WellcomeController extends Controller
{
    public function wellcome()
    {
      $galleris = Gallery::orderBy('created_at', 'desc')->get();
      $skills = Jurusan::all();
      $beritas = Berita::all();
      $info = Info::all();
      $advance = Advance::all();
      $whys = Why::all();
      return view('pages.index', [ 'skills' => $skills], ['galleris' => $galleris])->withBeritas($beritas)->withInfo($info)->withAdvance($advance)->withWhys($whys);
    }



    public function show($slug)
    {

        $jurusan = Jurusan::where('slug', '=', $slug)->first();

        return view('pages.jurusan')->withJurusan($jurusan);

    }

    public function showBerita($slug)
    {

        $beritas = Berita::where('slug', '=', $slug)->first();

        return view('pages.berita')->withBeritas($beritas);

    }

   public function getGallery()
   {
      // $galleris = Gallery::all();
    $galleris = Gallery::orderBy('created_at', 'desc')->paginate(3);
     return view('pages.gallerys', compact('galleris'));
   }

}

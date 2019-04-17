<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Corousel;

class CorouselController extends Controller
{
  public function index()
  {
    $this->data['slides'] = Corousel::all();

    return view('carousel.index')->with($this->data);
  }

  public function save(Request $r)
  {
    $file = $r->file('image');
    $fileName = time().'-'.$file->getClientOriginalName();
    $destinationPath = 'img/carousel';

    if ($file->move($destinationPath,$fileName)) {
      $carousel = new Corousel();
      $carousel->image = $fileName;
      $carousel->save();
    }

    return redirect()->route('carousel.index');
  }
}

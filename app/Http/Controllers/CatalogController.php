<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class CatalogController extends Controller
{
    private $uuid;

    public function __construct()
    {
      try {
        $this->uuid = Uuid::uuid4()->toString();
      } catch (UnsatisfiedDependencyException $e) {
        return; $e->getMessage();
      }
    }

    public function index()
    {
      $data['kategoris'] = Catalog::orderby('created_at','DESC')->paginate(10);
      return view('katalog.index')->with($data);
    }


    public function create()
    {
      return view('katalog.create');
    }

    public function save(Request $r)
    {
      $kategori = new Catalog();
      $kategori->name = $r->nama;
      $kategori->str_id = strtolower(str_replace(" ","-",$kategori->name));
      $kategori->uuid = $this->uuid;
      $kategori->description = $r->deskripsi;
      $kategori->save();

      return redirect(route('kategori.index'));
    }

    public function edit($id)
    {
        $data['kategori'] = Catalog::where('uuid',$id)->firstOrFail();
        // dd($data);
        return view('katalog.edit')->with($data);
    }

    public function update(Request $r)
    {
      $kategori = Catalog::where('uuid',$r->uuid)->firstOrFail();
      $kategori->name = $r->nama;
      $kategori->str_id = strtolower(str_replace(" ","-",$kategori->name));
      $kategori->uuid = $this->uuid;
      $kategori->description = $r->deskripsi;
      $kategori->save();

      return redirect(route('kategori.index'));
    }

    public function delete($id)
    {
      Catalog::where('uuid',$id)->delete();

      return redirect()->route('kategori.index');
    }
}

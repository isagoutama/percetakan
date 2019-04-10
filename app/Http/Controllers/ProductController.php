<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

use App\Product;
use App\Catalog;
class ProductController extends Controller
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
      $data['produks'] = Product::orderBy('created_at','DESC')->paginate(25);
      return view('produk.index')->with($data);
    }

    public function create()
    {
      $data['kategori'] = Catalog::all();
      return view('produk.create')->with($data);
    }

    public function save(Request $r)
    {
      $file = $r->file('image');
      $fileName = time().'.'.$file->getClientOriginalName();
      $destinationPath = 'img/produk';
      $file->move($destinationPath,$fileName);

      $produk = new Product();
      $produk->name = $r->name;
      $produk->harga = $r->harga;
      $produk->catalog_id = $r->kategori;
      $produk->str_id = strtolower(str_replace(" ","-",$produk->name));
      $produk->uuid = $this->uuid;
      $produk->image = $fileName;
      $produk->description = $r->description;
      $produk->save();

      return redirect()->route('produk.index');
    }

    public function edit($id)
    {
      $data['produk'] = Product::where('uuid',$id)->firstOrFail();
      return view('produk.edit')->with($data);
    }

    public function update(Request $r)
    {
      $file = $r->file('image');

      $produk = Product::where('uuid',$r->uuid)->first();
      $produk->name = $r->name;
      $produk->harga = $r->harga;
      $produk->catalog_id = $r->kategori;
      $produk->str_id = strtolower(str_replace(" ","-",$produk->name));
      $produk->uuid = $this->uuid;
      if ($produk->image != $r->image) {
        File::delete(public_path().'/img/produk/'.$produk->image);
        $fileName = time().'.'.$file->getClientOriginalName();
        $destinationPath = 'img/produk';
        $file->move($destinationPath,$fileName);
      }
      $produk->image = $fileName;
      $produk->description = $r->description;
      $produk->save();

      return redirect()->route('produk.index');
    }

    public function delete($id)
    {
      $produk = Product::where('uuid',$id)->firstOrFail();
      if (File::delete(public_path().'/img/produk/'.$produk->image)) {
        $produk->delete();
      }
      return redirect()->route('produk.index');
    }


}

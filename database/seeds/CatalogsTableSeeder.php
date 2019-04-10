<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Kartu Nama', 'Kop Surat','Flyer','Box Kardus','ID Card','Paper Bag',
                  'Tote Bag','Lunch Box','Snack Box','Box Produk','Mug','Jam Dinding'];
        for ($i=0; $i < count($array) ; $i++) {
          $kategori = new \App\Catalog();
          $kategori->name = $array[$i];
          $kategori->str_id = strtolower(str_replace(" ","-",$kategori->name));
          $kategori->uuid = Uuid::uuid4()->toString();
          $kategori->description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
          $kategori->save();
        }
    }
}

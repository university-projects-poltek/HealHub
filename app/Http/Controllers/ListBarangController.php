<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListBarangController extends Controller
{
  public function getData()
  {
      $dataBarang = [
      ['id' => 1, 'nama' => 'beras pandan wangi', 'harga' => 15000],
      ['id' => 2, 'nama' => 'tepung terigu', 'harga' => 15000],
      ['id' => 3, 'nama' => 'baygon', 'harga' => 15000],
      ['id' => 4, 'nama' => 'penyedap royco', 'harga' => 15000],
      ['id' => 5, 'nama' => 'minyak goreng', 'harga' => 15000],
      ];

      return $dataBarang;
  }

  public function tampilkan(){
    $data = $this->getData();
    return view('list_barang', compact('data'));
  }
}

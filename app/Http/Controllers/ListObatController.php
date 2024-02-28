<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ListObatController extends Controller
{
   function tampilkan($id, $nama, $jenis) {
    return view('list_obat', ['id' => $id, 'nama' => $nama,'jenis' => $jenis ]);
   }
}

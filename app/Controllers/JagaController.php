<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JagaController extends BaseController
{
    public function index()
    {
        // Menampilkan Dashboard Dinas Jaga
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
        ];
        return view('admin/jaga', $data);
    }
}
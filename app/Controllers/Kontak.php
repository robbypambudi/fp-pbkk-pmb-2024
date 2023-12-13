<?php

namespace App\Controllers;

class Kontak extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kontak'
        ];
        return view('kontak', $data);
    }
}

<?php

namespace App\Controllers;

class Petunjuk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Petunjuk Pendaftaran'
        ];
        return view('petunjuk', $data);
    }
}

<?php

namespace App\Controllers;

class Persyaratan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Persyaratan S1'
        ];
        return view('persyaratan', $data);
    }

    public function d3()
    {
        $data = [
            'title' => 'Persyaratan D3'
        ];
        return view('persyaratan-d3', $data);
    }
}

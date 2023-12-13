<?php

namespace App\Controllers;

class Jadwal extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Jadwal S1'
        ];
        return view('jadwal', $data);
    }

    public function d3()
    {
        $data = [
            'title' => 'Jadwal D3'
        ];
        return view('jadwal-d3', $data);
    }
}

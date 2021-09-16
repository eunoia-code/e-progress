<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
          'title' => 'E-Progres | Dashboard',
          'slug' => 'dashboard'
        ];

        return view('dashboard', $data);
    }

    public function progress()
    {
        $data = [
          'title' => 'E-Progres | Progress',
          'slug' => 'progress'
        ];

        return view('progress', $data);
    }

    public function progress_add()
    {
        $data = [
          'title' => 'E-Progres | Tambah Data',
          'slug' => 'progress'
        ];

        return view('progress_add', $data);
    }

    public function progress_edit()
    {
        $data = [
          'title' => 'E-Progres | Edit Data',
          'slug' => 'progress'
        ];

        return view('progress_edit', $data);
    }

    public function progress_detail()
    {
        $data = [
          'title' => 'E-Progres | Lihat Data',
          'slug' => 'progress'
        ];

        return view('progress_detail', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\Progress_model;

class Home extends BaseController
{
  public function index()
  {
    $model = new Progress_model();

    $data = [
      'title' => 'E-Progres | Dashboard',
      'slug' => 'dashboard',
      'total_project' => $model->countProject(),
      'ongoing_project' => $model->countOngoingProject(),
      'completed_project' => $model->countCompletedProject(),
      'terminated_project' => $model->countTerminatedProject()
    ];

    return view('dashboard', $data);
  }

  public function progress()
  {
    $model = new Progress_model();
    $data = [
      'title' => 'E-Progres | Progress',
      'slug' => 'progress',
      'data' => $model->getProject()
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

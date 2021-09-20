<?php

namespace App\Controllers;

use App\Models\Progress_model;

class Home extends BaseController
{

  public function __construct()
  {
    helper('form', 'uri');
    // $this->validation = \Config\Services::validation();
    $this->session = \Config\Services::session();
    $this->progress = new Progress_model();
  }
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
    $data = [
      'title' => 'E-Progres | Progress',
      'slug' => 'progress',
      'data' => $this->progress->getProject()
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

  public function progress_edit($id)
  {
    $data = [
      'title' => 'E-Progres | Edit Data',
      'slug' => 'progress',
      'data' => $this->progress->getProject($id)->getRow(),
    ];

    return view('progress_edit', $data);
  }

  public function progress_detail($id)
  {
    $data = [
      'title' => 'E-Progres | Lihat Data',
      'slug' => 'progress',
      'data' => $this->progress->getProject($id)->getRow(),
    ];

    return view('progress_detail', $data);
  }

  public function create()
  {
    $data = array(
      'pic'  => $this->request->getPost('pic'),
      'project' => $this->request->getPost('project'),
      'desc_project' => $this->request->getPost('desc_project'),
      'durasi' => $this->request->getPost('durasi'),
      'periode' => $this->request->getPost('periode'),
      'project_progress' => $this->request->getPost('project_progress'),
      'status' => $this->request->getPost('status'),
      'tgl_sit' => $this->request->getPost('tgl_sit'),
      'tgl_uat' => $this->request->getPost('tgl_uat'),
      'tgl_to' => $this->request->getPost('tgl_to'),
      'dokumen_pendukung' => $this->request->getPost('dokumen_pendukung'),
      'os' => $this->request->getPost('os'),
      'message_h2h' => $this->request->getPost('message_h2h'),
    );

    $insert = $this->progress->addProject($data);
    if ($insert) {
      $this->session->setFlashdata('sukses', 'Project berhasil ditambahkan');
    } else {
      $this->session->setFlashdata('gagal', "Project Tidak Valid, Gagal menyimpan data");
    }

    return redirect()->to('/Home/Progress');
  }

  public function update()
  {

    $id = $this->request->getPost('id_project');
    $data = array(
      'pic'  => $this->request->getPost('pic'),
      'project' => $this->request->getPost('project'),
      'desc_project' => $this->request->getPost('desc_project'),
      'durasi' => $this->request->getPost('durasi'),
      'periode' => $this->request->getPost('periode'),
      'project_progress' => $this->request->getPost('project_progress'),
      'status' => $this->request->getPost('status'),
      'tgl_sit' => $this->request->getPost('tgl_sit'),
      'tgl_uat' => $this->request->getPost('tgl_uat'),
      'tgl_to' => $this->request->getPost('tgl_to'),
      'dokumen_pendukung' => $this->request->getPost('dokumen_pendukung'),
      'os' => $this->request->getPost('os'),
      'message_h2h' => $this->request->getPost('message_h2h'),
    );

    $update = $this->progress->updateProject($data, $id);
    if ($update) {
      $this->session->setFlashdata('sukses', 'Project berhasil diupdate');
    } else {
      $this->session->setFlashdata('gagal', "Project Tidak Valid, Gagal menyimpan perubahan data");
    }

    return redirect()->to('/Home/Progress');
  }

  public function delete($id)
  {

    $delete = $this->progress->deleteProject($id);
    if ($delete) {
      $this->session->setFlashdata('sukses', 'Project berhasil dihapus');
    } else {
      $this->session->setFlashdata('gagal', "Project tidak berhasil dihapus");
    }
    return redirect()->to('/Home/Progress');
  }
}

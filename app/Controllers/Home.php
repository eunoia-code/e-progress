<?php

namespace App\Controllers;

use App\Models\Progress_model;
use App\Models\Upload_model;
use App\Models\Member_model;

class Home extends BaseController
{

  public function __construct()
  {
    helper('form', 'uri');

    $this->session = \Config\Services::session();
    $this->progress = new Progress_model();
    $this->upload = new Upload_model();
    $this->member = new Member_model();
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
      'files' => $this->upload->getFile($id)->getResult()
    ];

    return view('progress_edit', $data);
  }

  public function progress_detail($id)
  {
    $data = [
      'title' => 'E-Progres | Lihat Data',
      'slug' => 'progress',
      'data' => $this->progress->getProject($id)->getRow(),
      'files' => $this->upload->getFile($id)->getResult()
    ];


    return view('progress_detail', $data);
  }

  public function create()
  {
    $files = $this->request->getFiles();

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
      'os' => $this->request->getPost('os'),
      'message_h2h' => $this->request->getPost('message_h2h'),
    );

    $insert_id = $this->progress->addProject($data);

    if ($insert_id) {
      foreach ($files['file_upload'] as $file) {
        $random_name = $file->getRandomName();
        $data_uploads = array(
          'id_project' => $insert_id,
          'nama_file' => $file->getName(),
          'size' => $file->getSizeByUnit('mb'),
          'file' => $random_name
        );
        if ($file->getError() != 4) {
          $this->upload->insertFile($data_uploads);
          $file->move(ROOTPATH . 'public/uploads', $random_name);
        }
      }

      $this->session->setFlashdata('sukses', 'Project berhasil ditambahkan');
    } else {
      $this->session->setFlashdata('gagal', "Project Tidak Valid, Gagal menyimpan data");
    }

    return redirect()->to('/Home/Progress');
  }

  public function update()
  {

    $id = $this->request->getPost('id_project');
    $files = $this->request->getFiles();
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
      'os' => $this->request->getPost('os'),
      'message_h2h' => $this->request->getPost('message_h2h'),
    );

    $update = $this->progress->updateProject($data, $id);
    if ($update) {
      foreach ($files['file_upload'] as $file) {

        $random_name = $file->getRandomName();
        $data_uploads = array(
          'id_project' => $id,
          'nama_file' => $file->getName(),
          'size' => $file->getSizeByUnit('mb'),
          'file' => $random_name
        );

        if ($file->getError() != 4) {
          $this->upload->insertFile($data_uploads);
          $file->move(ROOTPATH . 'public/uploads', $random_name);
        }
      }

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

  public function delete_file($id)
  {
    $data = $this->upload->getById($id)->getRow();
    $file = $data->file;

    unlink(ROOTPATH . 'public/uploads/' . $file);

    $delete = $this->upload->deleteFile($id);
    if ($delete) {
      $this->session->setFlashdata('sukses', 'Data File Project berhasil dihapus');
    } else {
      $this->session->setFlashdata('gagal', "Data File Project tidak berhasil dihapus");
    }
    return redirect()->to('/Home/Progress');
  }

  public function member()
  {
    $data = [
      'title' => 'E-Progres | Member',
      'slug' => 'member',
      'data' => $this->member->getMember()
    ];

    return view('member', $data);
  }

  public function member_add()
  {
    $data = [
      'title' => 'E-Progres | Tambah Member',
      'slug' => 'member'
    ];

    return view('member_add', $data);
  }

  public function member_edit($id)
  {
    $data = [
      'title' => 'E-Progres | Edit Data Member',
      'slug' => 'member',
      'data' => $this->member->getMember($id)->getRow()
    ];

    return view('member_edit', $data);
  }

  public function member_create()
  {
    $foto = $this->request->getFile('foto');
    $namaFile = $foto->getRandomName();
    $foto->move('foto', $namaFile);

    $data = array(
        'id_member' => $this->request->getPost('id_member'),
        'nama_member' => $this->request->getPost('nama_member'),
        'divisi' => $this->request->getPost('divisi'),
        'alamat' => $this->request->getPost('alamat'),
        'foto' => $namaFile
    );

    $this->member->addMember($data);
    session()->setFlashdata('success', 'Data Berhasil Ditambahkan');

    return redirect()->to('/Home/member');

  }

  public function member_update()
  {
    $foto = $this->request->getFile('foto');

    $namaFile = '';

    if($foto->getError() == 4){
      $namaFile = $this->request->getPost('filelama');
    }else {
      $namaFile = $foto->getRandomName();
      $foto->move('foto', $namaFile);
      unlink('foto/'.$filelama);
    }

    $data = array(
        'id_member' => $this->request->getPost('id_member'),
        'nama_member' => $this->request->getPost('nama_member'),
        'divisi' => $this->request->getPost('divisi'),
        'alamat' => $this->request->getPost('alamat'),
        'foto' => $namaFile
    );

    $this->member->updateMember($data, $data['id_member']);
    session()->setFlashdata('success', 'Data Berhasil Diubah');

    return redirect()->to('/Home/member');
  }

  public function member_delete($id)
  {
    $data = $this->member->getMember($id)->getRow();
    $delete = $this->member->deleteMember($id);

    if ($delete) {
      unlink('foto/'.$data->foto);
      $this->session->setFlashdata('sukses', 'Member berhasil dihapus');
    } else {
      $this->session->setFlashdata('gagal', "Member tidak berhasil dihapus");
    }
    return redirect()->to('/Home/Member');
  }
}

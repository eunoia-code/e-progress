<?= $this->extend('base') ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Member</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

        <?php if (session()->getFlashdata('sukses')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses </strong> <?= session()->getFlashdata('sukses'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <?php if (session()->getFlashdata('gagal')) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal </strong> <?= session()->getFlashdata('gagal'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Member</h3>

                <div class="card-tools">

                    <a class="btn btn-primary" href="/Home/Member_add/" role="button">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body p-0 m-2">
                <table class="table table-striped projects" id="table_member">
                    <thead>
                        <tr align="center">
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 15%">
                                ID Member
                            </th>
                            <th style="width: 20%">
                                Nama Member
                            </th>
                            <th style="width: 20%">
                                Divisi
                            </th>
                            <th style="width: 20%">
                                Alamat
                            </th>
                            <th>
                                Foto
                            </th>
                            <th style="width: 25%">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      foreach ($data as $row) : ?>

                          <tr>
                              <td class=" align-top">
                                  <?= $i++; ?>
                              </td>
                              <td class=" align-top">
                                  <?= $row['id_member']; ?>
                              </td>
                              <td class=" align-top">
                                  <?= $row['nama_member']; ?>
                              </td>
                              <td class=" align-top">
                                  <?= $row['divisi']; ?>
                              </td class=" align-top">
                              <td class=" align-top">
                                  <?= $row['alamat']; ?>
                              </td>
                              <td>
                                  <img class="img-fluid" src="<?= base_url('foto/'.$row['foto']) ?>" alt="">
                              </td>
                              <td class="project-actions text-right align-top">
                                  <!-- <a class="btn btn-primary btn-sm" href="/Home/Progress_detail/<?= $row['id_member']; ?>">
                                      <i class="fas fa-eye">
                                      </i>Lihat
                                  </a> -->
                                  <a class="btn btn-info btn-sm" href="/Home/member_edit/<?= $row['id_member']; ?>">
                                      <i class="fas fa-pencil-alt">
                                      </i>Ubah
                                  </a>
                                  <button type="button" onclick="initHapus('<?= base_url('/Home/member_delete/' . $row['id_member']) ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>

                              </td>
                          </tr>

                                         
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<script>
    $(document).ready(function() { //Error happens here, $ is not defined.

        $('#table_member').DataTable({
            ordering: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari Progress",
            }
        });
    });
</script>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>

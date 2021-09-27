<?= $this->extend('base') ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
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
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">

                    <a class="btn btn-primary" href="/Home/Progress_add/" role="button">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body p-0 m-2">
                <table class="table table-striped projects" id="table_progress">
                    <thead>
                        <tr align="center">
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Nama Projek
                            </th>
                            <th style="width: 20%">
                                Periode
                            </th>
                            <th>
                                Progress
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
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
                                <td>
                                    <?= $i++; ?>
                                </td>
                                <td>
                                    <a>
                                        <?= $row['project']; ?>
                                    </a>
                                    <br />
                                    <small> Dibuat
                                        <?php
                                        $tgl = date_create($row['time_stamp']);
                                        echo date_format($tgl, "d-m-Y");
                                        ?>
                                    </small>
                                </td>
                                <td>
                                    <?= $row['periode']; ?>
                                </td>

                                <?php $progress = $row['project_progress']; ?>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $progress ?>%">
                                        </div>
                                    </div>
                                    <small>
                                        <?= $progress ?>% Complete
                                    </small>
                                </td>

                                <td class="project-state">
                                    <?php
                                    if ($row['status'] == '0') {
                                        echo '<span class="badge badge-info p-2">Project Berjalan</span>';
                                    } else if ($row['status'] == '1') {
                                        echo '<span class="badge badge-success p-2">Success</span>';
                                    } else if ($row['status'] == '2') {
                                        echo '<span class="badge badge-danger p-2">Dibatalkan</span>';
                                    }
                                    ?>
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="/Home/Progress_detail/<?= $row['id_project']; ?>">
                                        <i class="fas fa-eye">
                                        </i>Lihat
                                    </a>
                                    <a class="btn btn-info btn-sm" href="/Home/Progress_edit/<?= $row['id_project']; ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>Ubah
                                    </a>
                                    <button type="button" onclick="initHapus('<?= base_url('/Home/delete/' . $row['id_project']) ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>

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

        $('#table_progress').DataTable({
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
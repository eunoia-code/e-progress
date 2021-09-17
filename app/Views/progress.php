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

        <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal </strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">

                    <a class="btn btn-light" href="/Home/Progress_add/" role="button">
                        <i class="fas fa-plus"></i> Create
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Project
                            </th>
                            <th style="width: 30%">
                                Periode
                            </th>
                            <th>
                                Project Progress
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
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
                                    <small> Created
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
                                    if ($row['status'] == 'Selesai') {
                                        echo '<span class="badge badge-success">Success</span>';
                                    } else if ($row['status'] == 'Sedang Berjalan') {
                                        echo '<span class="badge badge-info">Sedang Berjalan</span>';
                                    } else if ($row['status'] == 'Gagal') {
                                        echo '<span class="badge badge-danger">Gagal</span>';
                                    }
                                    ?>
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="/Home/Progress_detail/<?= $row['id_project']; ?>">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="/Home/Progress_edit/<?= $row['id_project']; ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
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
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
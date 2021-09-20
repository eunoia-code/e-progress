<?= $this->extend('base') ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
    <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Umum</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label for="inputName">PIC</label>
                  <input type="hidden" id="id_project" name="id_project" value="<?= $data->id_project ?>" readonly>
                  <input type="text" id="pic" name="pic" class="form-control" value="<?= $data->pic ?>" required readonly>
                </div>

                <div class="form-group">
                  <label for="inputName">Nama Project</label>
                  <input type="text" id="project" name="project" class="form-control" value="<?= $data->project ?>" required readonly>
                </div>

                <div class="form-group">
                  <label for="inputDescription">Deskripsi Project</label>
                  <textarea id="desc_project" name="desc_project" class="form-control" rows="3" required readonly><?= $data->desc_project ?></textarea>
                </div>

                <div class="form-group">
                  <label for="inputName">Durasi</label>
                  <input type="text" id="durasi" name="durasi" class="form-control" value="<?= $data->durasi ?>" required readonly>
                </div>


                <div class="form-group">
                  <label for="inputName">Periode</label>
                  <input type="text" id="periode" name="periode" class="form-control" value="<?= $data->periode ?>" required readonly>
                </div>

                <div class="form-group">
                  <label for="inputStatus">Progress</label>
                  <select id="project_progress" name="project_progress" class="form-control custom-select" required readonly>

                    <option value="0"> 0% </option>
                    <option value="25">25%</option>
                    <option value="50">50%</option>
                    <option value="75">75%</option>
                    <option value="100">100%</option>
                  </select>
                </div>


                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select id="status" name="status" class="form-control custom-select" required readonly>
                    <option selected disabled>-Pilih Status-</option>
                    <option value="0">Project Berjalan</option>
                    <option value="1">Selesai</option>
                    <option value="2">Dibatalkan</option>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Tambahan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label for="input">Tanggal SIT</label>
                  <input type="date" id="tgl_sit" name="tgl_sit" class="form-control" value="<?= $data->tgl_sit ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="input">Tanggal UAT</label>
                  <input type="date" id="tgl_uat" name="tgl_uat" class="form-control" value="<?= $data->tgl_uat ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="input">Tanggal TO</label>
                  <input type="date" id="tgl_to" name="tgl_to" class="form-control" value="<?= $data->tgl_to ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="input">Dokumen Pendukung</label>
                  <input type="text" id="dokumen_pendukung" name="dokumen_pendukung" class="form-control" value="<?= $data->dokumen_pendukung ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="input">OS</label>
                  <input type="text" id="os" name="os" class="form-control" value="<?= $data->os ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="input">Message H2H</label>
                  <input type="text" id="message_h2h" name="message_h2h" class="form-control" value="<?= $data->message_h2h ?>" readonly>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12" style="margin-bottom:8px">
            <a href="/Home/Progress/" class="btn btn-secondary">Kembali</a>
          </div>
        </div>
      </section>
    <!-- /.content -->
  </div>
</div>

<script type="text/javascript">
  document.getElementById("project_progress").value = <?= $data->project_progress ?>;
  document.getElementById("status").value = <?= $data->status ?>;
</script>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>

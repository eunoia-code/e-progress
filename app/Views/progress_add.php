<?= $this->extend('base') ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label for="inputName">PIC</label>
              <input type="text" id="pic" name="pic" class="form-control">
            </div>

            <div class="form-group">
              <label for="inputName">Nama Projek</label>
              <input type="text" id="project" name="project" class="form-control">
            </div>

            <div class="form-group">
              <label for="inputDescription">Project Description</label>
              <textarea id="inputDescription" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="inputName">Durasi</label>
              <input type="text" id="durasi" name="durasi" class="form-control">
            </div>

            <div class="form-group">
              <label for="inputName">Periode</label>
              <input type="text" id="periode" name="periode" class="form-control">
            </div>

            <div class="form-group">
              <label for="inputStatus">Progress</label>
              <select id="status" name="project_progress" class="form-control custom-select">
                <option value="0"> 0% </option>
                <option value="25">25%</option>
                <option value="50">50%</option>
                <option value="75">75%</option>
                <option value="100">100%</option>
              </select>
            </div>


            <div class="form-group">
              <label for="inputStatus">Status</label>
              <select id="status" name="status" class="form-control custom-select">
                <option selected disabled>-Pilih Status-</option>
                <option value="Sedang Berjalan"> Sedang Berjalan </option>
                <option value="Batal">Batal</option>
                <option value="Sukses">Sukses</option>
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
              <input type="date" id="tgl_sit" name="tgl_sit" class="form-control">
            </div>

            <div class="form-group">
              <label for="input">Tanggal UAT</label>
              <input type="date" id="tgl_uat" name="tgl_uat" class="form-control">
            </div>

            <div class="form-group">
              <label for="input">Tanggal TO</label>
              <input type="date" id="tgl_to" name="tgl_to" class="form-control">
            </div>

            <div class="form-group">
              <label for="input">Dokumen Pendukung</label>
              <input type="text" id="dokumen_pendukung" name="dokumen_pendukung" class="form-control">
            </div>

            <div class="form-group">
              <label for="input">OS</label>
              <input type="text" id="os" name="os" class="form-control">
            </div>

            <div class="form-group">
              <label for="input">Message H2H</label>
              <input type="text" id="message_h2h" name="message_h2h" class="form-control">
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="/Home/Progress/" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>
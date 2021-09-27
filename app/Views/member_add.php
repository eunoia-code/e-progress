<?= $this->extend('base') ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mb-8">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Member</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Member</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
    <!-- Main content -->
    <form action="/Home/member_create" enctype="multipart/form-data" method="post">
      <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Member</h3>
            </div>
            <div class="card-body p-0 m-2">
              <div class="form-group">
                <label for="inputName">ID Member</label>
                <input type="text" id="id_member" maxlength="5" name="id_member" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="inputName">Nama Member</label>
                <input type="text" id="nama_member" name="nama_member" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="inputName">Divisi</label>
                <input type="text" id="divisi" name="divisi" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="inputDescription">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="2" required></textarea>
              </div>

              <div class="form-group">
                <label for="foto" class="mr-4">Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto" id="foto" required>
                  <label class="custom-file-label" for="foto" id="label_foto">Pilih Foto...</label>
                </div>
              </div>
              <div class="form-group">

              </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
          <div class="col-12" style="margin-bottom:8px">
            <a href="/Home/Member/" class="btn btn-secondary">Batal</a>
            <input type="submit" value="Tambah Member" class="btn btn-success float-right">
          </div>
        </div>
      </section>
    </form>
    <!-- /.content -->
  </div>
</div>

<script type="text/javascript">
$('#foto').on('change', function(){
    $('#label_foto').text($('#foto').val().split('\\').pop());
});
</script>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>

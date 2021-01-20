<?php echo $header, $navbar, $sidenav; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($wrapper as $value) : ?>
                            <li class="breadcrumb-item <?= $value->type; ?>">
                                <?php if ($value->link == null) { ?>
                                    <?= $value->title; ?>
                                <?php } else { ?>
                                    <a href="<?= base_url($value->link); ?>"><?= $value->title; ?></a>
                                <?php }; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$title?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url('kps/pkl/updateStatus');?>" method="post">
                <div class="card-body">
                  <input type="hidden" name="pkl_id" value="<?=$dataPkl->pkl_id?>"/>
                <div class="form-group">
                  <label>Status Validasi</label>
                  <select name="validasi" class="form-control">
                    <?php if($dataPkl->status_val == 0){ ?>
                        <option value="0" selected>Noval</option>
                        <option value="1">Validasi KPS</option>
                        <option value="2">Validasi UP2AI</option>
                    <?php }else if($dataPkl->status_val == 1){ ?>
                        <option value="0">Noval</option>
                        <option value="1" selected>Validasi KPS</option>
                        <option value="2">Validasi UP2AI</option>
                    <?php }else if($dataPkl->status_val == 2){ ?>
                        <option value="0">Noval</option>
                        <option value="1">Validasi KPS</option>
                        <option value="2" selected>Validasi UP2AI</option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status Daftar</label>
                  <select name="daftar" class="form-control">
                    <?php if($dataPkl->status_daftar == 0){ ?>
                        <option value="0" selected>Baru</option>
                        <option value="1">Surat</option>
                        <option value="2">Proses</option>
                        <option value="3">Terima</option>
                        <option value="4">Ditolak</option>
                    <?php }else if($dataPkl->status_daftar == 1){ ?>
                        <option value="0">Baru</option>
                        <option value="1" selected>Surat</option>
                        <option value="2">Proses</option>
                        <option value="3">Terima</option>
                        <option value="4">Ditolak</option>
                    <?php }else if($dataPkl->status_daftar == 2){ ?>
                        <option value="0">Baru</option>
                        <option value="1">Surat</option>
                        <option value="2" selected>Proses</option>
                        <option value="3">Terima</option>
                        <option value="4">Ditolak</option>
                    <?php }else if($dataPkl->status_daftar == 3){ ?>
                        <option value="0">Baru</option>
                        <option value="1">Surat</option>
                        <option value="2">Proses</option>
                        <option value="3" selected>Terima</option>
                        <option value="4">Ditolak</option>
                    <?php }else if($dataPkl->status_daftar == 4){ ?>
                        <option value="0">Baru</option>
                        <option value="1">Surat</option>
                        <option value="2">Proses</option>
                        <option value="3">Terima</option>
                        <option value="4" selected>Ditolak</option>
                    <?php }?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Status PKL</label>
                  <select name="status" class="form-control">
                    <?php if($dataPkl->status_pkl == 0){ ?>
                        <option value="0" selected>Daftar</option>
                        <option value="1">Proses</option>
                        <option value="2">Selesai</option>
                    <?php }else if($dataPkl->status_pkl == 1){ ?>
                        <option value="0" >Daftar</option>
                        <option value="1" selected>Proses</option>
                        <option value="2">Selesai</option>
                    <?php }else if($dataPkl->status_pkl == 2){ ?>
                        <option value="0" >Daftar</option>
                        <option value="1">Proses</option>
                        <option value="2" selected>Selesai</option>
                    <?php }?>
                  </select>
                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?=base_url('kps/pkl');?>" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Informasi Pengajuan PKL</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input readonly type="text" value="<?=$dataPkl->nama_perusahaan?>" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal PKL</label>
                                <input readonly type="text" value="<?=$dataPkl->tanggal_pkl?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input readonly type="text" value="<?=$dataPkl->thn_ajaran?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Prodi</label>
                                <input readonly type="text" value="<?=$dataPkl->prodi?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input readonly type="text" value="<?=$dataPkl->jurusan?>" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Data Mahasiswa</label>
                        <select disabled multiple class="form-control">
                            <?php foreach ($dataMhs as $val) : ?>
                                <?php if($val->user_id == $dataPkl->user_id): ?>
                                    <option><?= $val->nama ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Dosen Pembimbing</label>
                        <select disabled multiple class="form-control">
                            <?php foreach ($dataDospem as $val) : ?>
                                <?php if($val->pkl_id == $dataPkl->pkl_id): ?>
                                    <option><?= $val->nama_dosen ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->
<?php echo $footer; ?>

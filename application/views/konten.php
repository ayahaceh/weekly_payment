<div class="row">
        <div class="col-md-3">

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <?php
                    foreach($jenis as $j){
                ?>
                <li><a href="#"><i class="fa fa-inbox"></i> <?= $j['jenis_barang'] ?>
                  <span class="label label-primary pull-right">12</span></a>
                </li>
                <?php
                    }
                ?>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <!-- KONTEN BARANG -->
            <?php
                foreach ($barang as $b) {
            ?>
                <!-- Profile Image -->
            <div class="col-md-4">
            <div class="box">
                <div class="box-body box-profile">
                <img src="<?= base_url('uploads/'.$b['foto']) ?>" class="img-responsive" style="width: 200px; height: 200px;">
                <h3 class="profile-username text-center"><?= $b['nama'] ?></h3>

                <p class="text-muted text-center">Rp.<?= $b['harga'] ?></p>
                
                <button type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-fw fa-eye"></i>Lihat Barang
                </button>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#<?= $b['id_barang'] ?>">
                    <i class="fa fa-fw fa-shopping-cart"></i> Beli
                </button>
                <button type="button" class="btn btn-default btn-sm">
                        Stok <?= $b['stok_barang'] ?>
                </button>
                </div>
                <!-- /.box-body -->
            </div>
            </div>
                <!-- Profile Image -->

                <!-- modal -->
                <div class="modal fade" id="<?= $b['id_barang'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Beli Barang</h4>
                    </div>
                    <div class="modal-body">
                            <?= form_open('user')  ?>
                            <div class="box-body">
                                <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" value="<?= $b['id_barang'] ?>" type="hidden" name="id" readonly>
                                <input class="form-control" value="KD<?= rand(100,1000); ?>" type="hidden" name="kode" readonly>
                                <input class="form-control" type="text" name="nama" value="<?= $b['nama'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control"  placeholder="Jumlah" type="text" name="jumlah">
                                </div>
                            </div>
                            <!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </div>
                            </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <?php } ?>            


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
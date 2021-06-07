<div class="box box-primary">
  <div class="box-header with-border bg-primary">
    <h3 class="box-title"><i class="fa fa-reorder"></i> Tambah Barang Pembelian</h3>
  </div>
  <?php
  $id = $this->uri->segment(3);
  ?>

  <div class="row">
    <?php foreach ($pembelian as $b) {
      // $id =  $b['id'];
    ?>

      <div class="col-md-6">
        <div class="box-body">
          <div class="form-group">
            <label for="kode_faktur" class="col-sm-4 control-label">Nomor P.O</label>
            <div class="col-sm-8">
              <label class="text-primary"><?= $b['kode_faktur'] ?></label>
            </div>

            <label for="tgl_pembelian" class="col-sm-4 control-label">Tanggal</label>
            <div class="col-sm-8">
              <label class="text-primary"><?= $b['tgl_pembelian'] ?></label>
            </div>

            <label for="nama_supplier" class="col-sm-4 control-label">Supplier </label>
            <div class="col-sm-8">
              <label class="text-primary"><?= $b['nama_supplier'] ?></label>
            </div>

            <label for="alamat_supplier" class="col-sm-4 control-label">Alamat</label>
            <div class="col-sm-8">
              <label class="text-primary"><?= $b['alamat_supplier'] ?></label>
            </div>
          </div>

        </div><!-- /.box-body -->
      </div>

      <div class="col-md-6">
        <div class="box-body">
          <div class="form-group">
            <label for="tgl_pengiriman" class="col-sm-4 control-label">Tanggal Pengiriman</label>
            <div class="col-sm-8">
              <label class="text-primary"><?= $b['tgl_pengiriman'] ?></label>
            </div>

            <label for="alamat_pengiriman" class="col-sm-4 control-label">Alamat Pengiriman</label>
            <div class="col-sm-8">
              <label class="text-primary"><?= $b['alamat_pengiriman'] ?></label>
            </div>

          </div>

        </div><!-- /.box-body -->
      </div>
    <?php } ?>
  </div>
  <div class="box box-header bg-info">
    <?= form_open_multipart('pembelian/tambah_detail/' . $id)  ?>
    <!-- <input type="hidden" class="form-control" name="id_pembelian" value="<?php $id; ?>"> -->
    <div class="row">
      <div class="col-md-2">
        <label class="pull-right text-primary">Pilih Barang</label>
      </div>
      <div class="col-md-4">
        <select class="form-control" name="id_barang" required>
          <option>-- Pilih Barang --</option>
          <?php
          foreach ($barang as $s) {
            echo '<option value="' . $s['id_barang'] . '">' . $s['nama'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
            <input type="text" class="form-control" name="unit_barang" placeholder="Unit ..." required>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="harga_satuan" placeholder="Harga Satuan ..." required>
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box-body">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Total</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pembelian_detail as $br) {
              $jumlah_per_barang = $br['unit_barang'] * $br['harga_satuan'];
            ?>
              <tr>
                <td class="text-center"><?= $no ?></td>
                <td>BR-00<?= $br['id_barang'] ?></td>
                <td><?= $br['nama'] ?></td>
                <td class="text-center"><?= $br['satuan'] ?></td>
                <td class="text-right"><?= number_format($br['unit_barang'], 0, ",", ",") ?></td>
                <td class="text-right"><?= number_format($br['harga_satuan'], 0, ",", ",") ?></td>
                <td class="text-right"><?= number_format($jumlah_per_barang, 0, ",", ",") ?></td>
                <td class="text-center">
                  <?= anchor('pembelian/hapus_detail/' . $br['id'] . '/' . $br['id'], '<i class="fa fa-times"></i>', 'class="btn btn-danger btn-xs"') ?>
                </td>
              </tr>
            <?php
              $no++;
            }
            ?>
            </tfoot>
        </table>

      </div><!-- /.box-body -->
      <div class="box-footer bg-info">
        <div class="pull-right">
          <?= anchor('pembelian', 'Simpan', ' class="btn btn-success "') ?>
        </div>
      </div>
    </div>
  </div>


</div>
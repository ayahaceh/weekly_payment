<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Pemakaian barang/Item</h3>
  </div>
  <!-- /.box-header -->

  <!-- form start -->
  <?= form_open_multipart('transaksi/tambah_pemakaian')  ?>
  <div class="box-body">
    <div class="col-md-3">
      Project : <br />
      <strong><?= $project['nama_project'] ?></strong>
      <br />
      Costumer / Client : <br />
      <strong><?= $project['nama_costumer'] ?></strong>
      <input type="hidden" class="form-control" id="pemakaian" type="text" name="id_project" value="<?= $project['id'] ?>">
    </div>
    <div class="col-md-9">

      <div class="form-group">
        <label>Pilih Barang/Item</label>
        <select class="form-control" name="id_barang">
          <option>-- Pilih barang --</option>
          <?php
          foreach ($barang as $j) {
            echo '<option value="' . $j['id_barang'] . '">' . $j['nama'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Volume Pemakaian</label>
        <input class="form-control" id="pemakaian" placeholder="Volume" type="text" name="vol">
      </div>
      <div class="form-group">
        <label>Potongan (Ret)</label>
        <input class="form-control" id="pemakaian" placeholder="Potongan" type="text" name="potongan">
      </div>
      <div class="form-group">
        <label>Tanggal:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="datepicker" name="tgl">
        </div>
        <!-- /.input group -->
        <div class="form-group">
          <label>Minggu Ke :</label>
          <input class="form-control" id="pemakaian" placeholder="minggku ke ..." type="text" name="minggu">
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <div class="pull-right">
        <button type="submit" class="btn btn-default">Kembali</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?= form_open_multipart('data_barang/tambah_barang')  ?>
          <div class="box-body">
            <div class="form-group">
              <label>Nama Barang</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" type="text" name="nama">
            </div>
            <div class="form-group">
              <label>Satuan</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Satuan" type="text" name="satuan">
            </div>
            <div class="form-group">
              <label>Jenis Barang</label>
              <select class="form-control" name="jenis">
                <option>-- Pilih Jenis Barang --</option>
                <?php
                foreach ($jenis as $j) {
                  echo '<option value="' . $j['id_jenis'] . '">' . $j['jenis_barang'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Suplier</label>
              <select class="form-control" name="suplier">
                <option>-- Pilih Suplier --</option>
                <?php
                foreach ($suplier as $s) {
                  echo '<option value="' . $s['id_suplier'] . '">' . $s['nama_suplier'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Stok Barang</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" type="text" name="stok">
            </div>
            <div class="form-group">
              <label>Harga Modal</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Harga Modal" type="text" name="modal">
            </div>
            <div class="form-group">
              <label>Harga Jual</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Harga Jual" type="text" name="jual">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input id="exampleInputFile" type="file" name="cover" required="">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <div class="pull-right">
              <button type="submit" class="btn btn-default">Kembali</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
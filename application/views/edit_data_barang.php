        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?= form_open_multipart('data_barang/edit_data_barang')  ?>
          <div class="box-body">
            <div class="form-group">
              <label>Nama Barang</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" type="text" name="nama" value="<?= $barang['nama'] ?>">
              <input class="form-control" type="hidden" name="id" value="<?= $barang['id_barang'] ?>">
            </div>
            <div class="form-group">
              <label>Jenis Barang</label>
              <select class="form-control" name="jenis">
                <option>-- Pilih Jenis Barang --</option>
                <?php
                foreach ($jenis as $j) {
                ?>
                  <option value="<?= $j['id_jenis'] ?>" <?= $j['id_jenis'] == $barang['id_jenis'] ? 'selected' : ''; ?>> <?= $j['jenis_barang'] ?> </option>
                <?php
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
                ?>
                  <option value="<?= $s['id_suplier'] ?>" <?= $s['id_suplier'] == $barang['id_suplier'] ? 'selected' : ''; ?>> <?= $s['nama_suplier'] ?> </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Stok Barang</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" type="text" name="stok" value="<?= $barang['stok_barang'] ?>">
            </div>
            <div class="form-group">
              <label>Harga Modal</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Harga Modal" type="text" name="modal" value="<?= $barang['modal'] ?>">
            </div>
            <div class="form-group">
              <label>Harga Jual</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Harga Jual" type="text" name="jual" value="<?= $barang['harga'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input id="exampleInputFile" type="file" name="cover">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <div class="pull-right">
              <?= anchor('data_barang', 'Kembali', ' class="btn btn-default "') ?>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
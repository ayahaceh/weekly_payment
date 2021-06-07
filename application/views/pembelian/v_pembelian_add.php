        <div class="box box-primary">
          <div class="box-header with-border bg-primary">
            <h3 class="box-title"><i class="fa fa-reorder"></i> Input Pembelian</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?= form_open_multipart('pembelian/tambah_pembelian')  ?>
          <div class="row">
            <div class="col-md-6">
              <div class="box-body">

                <div class="form-group">
                  <label>No P.O</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="P.O #" type="text" name="kode_faktur" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Invoice </label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="tgl_pembelian" id="datepicker" required>
                  </div>
                </div>

                <div class="form-group">
                  <label>Suplier</label>
                  <select class="form-control" name="id_supplier" required>
                    <option>-- Pilih Suplier --</option>
                    <?php
                    foreach ($suplier as $s) {
                      echo '<option value="' . $s['id_supplier'] . '">' . $s['nama_supplier'] . '</option>';
                    }
                    ?>
                  </select>
                </div>

                <!-- <div class="form-group">
                  <label>Jumlah Invoice</label>
                  <input class="form-control" placeholder="Jumlah Invoice" type="text" name="jumlah">
                </div> -->

              </div><!-- /.box-body -->
            </div>

            <div class="col-md-6">
              <div class="box-body">

                <div class="form-group">
                  <label>Tanggal Pengiriman</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="tgl_pengiriman" id="datepicker2" required>
                  </div>
                </div>

                <div class="form-group">
                  <label>Alamat Pengiriman</label>
                  <textarea class="form-control" name="alamat_pengiriman" rows="3" placeholder="Alamat Pengiriman ..." required></textarea>
                </div>

              </div><!-- /.box-body -->
            </div>
          </div>


          <div class="box-footer">
            <div class="pull-right">
              <?= anchor('pembelian', 'Kembali', ' class="btn btn-default "') ?>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
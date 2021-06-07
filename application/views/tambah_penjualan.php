        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open('penjualan/tambah_penjualan')  ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Transaksi</label>
                  <input class="form-control" value="KD<?= rand(100,1000); ?>" type="text" name="kode" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <select class="form-control" name="nama">
                    <option>-- Pilih Nama Barang --</option>
                    <?php
                      foreach($barang as $b)
                      {
                    ?> 
                      <option value="<?=$b['id_barang'] ?>" ><?=$b['nama'] ?></option>
                    <?php
                      }  
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Jumlah" type="text" name="jumlah">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              	<div class="pull-right">
                <?= anchor('penjualan','Kembali',' class="btn btn-default "') ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            	</div>
              </div>
            </form>
          </div>

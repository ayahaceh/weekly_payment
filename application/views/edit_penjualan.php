<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open('penjualan/edit_penjualan')  ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Transaksi</label>
                  <input class="form-control" value="<?= $penjualan['kode_transaksi'] ?>" type="text" name="kode" readonly>
                  <input class="form-control" value="<?= $penjualan['id_transaksi'] ?>" type="hidden" name="id">
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <select class="form-control" name="nama">
                    <option>-- Pilih Nama Barang --</option>
                    <?php
                      foreach($barang as $b)
                      {
                    ?> 
                      <option value="<?=$b['id_barang'] ?>" <?= $penjualan['id_barang']==$b['id_barang']?'selected':''; ?> ><?=$b['nama'] ?></option>
                    <?php
                      }  
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input class="form-control" value="<?= $penjualan['jumlah'] ?>" type="text" name="jumlah">
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

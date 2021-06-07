        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open('jenis_barang/edit_jenis_barang')  ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input class="form-control" placeholder="Jenis Barang" type="text" name="jenis" value="<?= $jenis['jenis_barang'] ?>">
                  <input class="form-control" placeholder="Jenis Barang" type="hidden" name="id" value="<?= $jenis['id_jenis'] ?>">
                </div>
              <div class="box-footer">
              	<div class="pull-right">
                <?= anchor('jenis_barang','Kembali',' class="btn btn-default"') ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            	</div>
              </div>
            </form>
          </div>

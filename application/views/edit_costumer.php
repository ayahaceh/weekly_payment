        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open_multipart('costumer/edit_costumer')  ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Costumer</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Nama Costumer" type="text" name="nama" value="<?= $barang['uname'] ?>">
                  <input class="form-control" id="exampleInputEmail1" placeholder="Nama Costumer" type="hidden" name="id" value="<?= $barang['id_user'] ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Password" type="password" name="pass" value="<?= $barang['pass'] ?>">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option>-- Pilih Status --</option>
                    <option value='1'>Admin</option>
                    <option value='0'>User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input id="exampleInputFile" type="file" name="cover">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              	<div class="pull-right">
                <?= anchor('costumer','Kembali',' class="btn btn-default "') ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            	</div>
              </div>
            </form>
          </div>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Project</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?= form_open_multipart('project/edit_project')  ?>
          <div class="box-body">
            <div class="form-group">
              <label>Nama Project</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Nama Project" type="text" value="<?= $project['nama_project'] ?>" name="nama_project">
            </div>
            <div class="form-group">
              <label>Nama Costumer</label>
              <select class="form-control" name="id_costumer">
                <option>-- Pilih costumer --</option>
                <?php
                foreach ($costumer as $s) {
                ?>
                  <option value="<?= $s['id_costumer'] ?>" <?= $s['id_costumer'] == $project['id_costumer'] ? 'selected' : ''; ?>> <?= $s['nama_costumer'] ?> </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input class="form-control" id="exampleInputEmail1" placeholder="Nama Project" type="text" value="<?= $project['harga'] ?>" name="harga">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input id="exampleInputFile" type="file" name="cover" required="">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <div class="pull-right">
              <?= anchor('project', 'Kembali', ' class="btn btn-default "') ?>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
        </div>
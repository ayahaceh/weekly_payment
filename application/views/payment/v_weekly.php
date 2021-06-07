<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Weekly Payment</h3>
  </div>
  <!-- /.box-header -->

  <!-- form start -->
  <div class="box-body">
    <div class="col-md-6">
      <?= form_open_multipart('payment/mingguan')  ?>

      <div class="form-group">
        <label>Pilih Project</label>
        <select class="form-control" name="id_project">
          <option>-- Pilih Project --</option>
          <?php
          foreach ($project as $j) {
            echo '<option value="' . $j['id'] . '">' . $j['nama_project'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Minggu Ke :</label>
        <select class="form-control" name="minggu">
          <option>-- Pilih --</option>
          <?php
          $minggu  = array(1, 2, 3, 4);
          for ($i = 0; $i < sizeof($minggu); $i++) {
            echo '<option value="' . $minggu[$i] . '">' . $minggu[$i] . '</option>';
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary pull-right">Lihat</button>
      </form>
    </div>


    <div class="col-md-6">
      <h4 class="text-primary text-center">
        Silahkan pilih Project dan Minggu ke berapa!
      </h4>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <div class="pull-right">
        <!-- <button type="submit" class="btn btn-default">Kembali</button> -->

      </div>
    </div>
  </div>
</div>
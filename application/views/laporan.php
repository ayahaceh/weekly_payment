          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-sm-2">
                    <?= form_open(''); ?>
                    <select class="form-control" name="tanggal" type="submit" onchange="this.form.submit()">
                          <option>-- Pilih Tanggal --</option>
                          <?php
                            foreach($tanggal as $t)
                            { 
                              echo '<option>'.$t['tanggal'].'</option>';
                            }  
                          ?>
                    </select>
                    </form>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Stok Barang</th>
                  <th>Status Penjualan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($laporan as $j) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $j['kode_transaksi'] ?></td>
                  <td><?= $j['tanggal'] ?></td>
                  <td><?= $j['nama'] ?></td>
                  <td><?= $j['stok_barang'] ?></td>
                  <td><?= $j['status'] == 0 ? "<span class='label label-primary'>Proses</span>":"<span class='label label-success'>Selesai</span>"; ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#<?= $j['id_transaksi'] ?>">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                  </td>
                </tr>

                <!-- modal -->
                <div class="modal fade" id="<?= $j['id_transaksi'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Status Penjualan</h4>
                    </div>
                    <div class="modal-body">
                            <?= form_open('laporan/edit')  ?>
                            <div class="box-body">
                                <div class="form-group">
                                <input class="form-control" value="<?= $j['id_transaksi'] ?>" type="hidden" name="id" readonly>
                                <?php 
                                    $status = array(
                                        0 => 'Proses',
                                        1 => 'Selesai'
                                    );
                                    echo form_dropdown('status',$status,$j['status'],'class="form-control"'); 
                                ?>
                                </div>
                            </div>
                            <!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                            </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <?php
                    $no++;
                   } 
                ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

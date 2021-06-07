          <div class="box">
            <div class="box-header">
              <?= anchor('costumer/tambah_costumer','Tambah','class="btn btn-primary"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama Costumer</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($barang as $b) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><img src="<?= base_url('uploads/'.$b['foto']) ?>" width='50px'></td>
                  <td><?= $b['uname'] ?></td>
                  <td><?= $b['status'] == 1 ? 'Admin' : 'User' ?></td>
                  <td>
                    <?= anchor('costumer/view_costumer/'. $b['id_user'] ,'<i class="fa fa-eye"></i>','class="btn btn-success btn-sm"') ?>
                    <?= anchor('costumer/edit_costumer/'. $b['id_user'] ,'<i class="fa fa-edit"></i>','class="btn btn-warning btn-sm"') ?>
                    <?= anchor('costumer/delete_costumer/'. $b['id_user'] ,'<i class="fa fa-trash"></i>','class="btn btn-danger btn-sm"') ?>
                  </td>
                </tr>
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

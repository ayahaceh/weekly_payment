<div class="box box-primary">
    <div class="box-header with-border bg-info">
        <i class="fa fa-clone text-primary"></i>
        <h3 class="box-title text-primary">Transaksi Pemakaian Item</h3>
        <div class="pull-right box-tools">
            <?= anchor('transaksi/', '<i class="fa fa-arrow-left"></i> &nbsp; Kembali', 'class="btn btn-success btn-sm"') ?>
            <?= anchor('transaksi/tambah_pemakaian/' . $project['id'], '<i class="fa fa-clone"></i> &nbsp; Tambah Pemakaian', 'class="btn btn-primary btn-sm"') ?>
        </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <div class="col-md-3">
            Project : <br />
            <strong><?= $project['nama_project'] ?></strong>
            <br />
            Costumer / Client : <br />
            <strong><?= $project['nama_costumer'] ?></strong>
        </div>
        <div class="col-md-9">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Volume</th>
                        <th>Potongan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pemakaian as $b) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $b['tgl'] ?></td>
                            <td><?= $b['nama'] ?></td>
                            <td><?= $b['satuan'] ?></td>
                            <td><?= $b['vol'] ?>.00</td>
                            <td><?= $b['potongan'] ?>%</td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                    </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
    </div>
    <!-- /.box-footer -->
</div>
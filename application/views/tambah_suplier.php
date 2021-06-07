        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= form_open('suplier/add_suplier')  ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama suplier</label>
                  <input class="form-control" placeholder="Nama Suplier" type="text" name="nama">
                </div>
              <div class="box-footer">
              	<div class="pull-right">
                <?= anchor('suplier','Kembali',' class="btn btn-default"') ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            	</div>
              </div>
            </form>
          </div>

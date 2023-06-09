<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card shadow-sm border-bottom-primary">
      <div class="card-header bg-white py-3">
        <div class="row">
          <div class="col">
            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
              Form Adjust Stock Product
            </h4>
          </div>
          <div class="col-auto">
            <a href="<?= base_url('adjust') ?>" class="btn btn-sm btn-secondary btn-icon-split">
              <span class="icon">
                <i class="fa fa-arrow-left"></i>
              </span>
              <span class="text">
                Back
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('pesan'); ?>
        <?= form_open('', [], ['stok' => 0,  'user_id' => $this->session->userdata('login_session')['user']]); ?>
        <div class="row form-group">
          <label class="col-md-3 text-md-right" for="jenis_id">Product</label>
          <div class="col-md-9">
            <div class="input-group">
              <select name="id_barang" id="barang_id" class="custom-select">
                <option value="" selected disabled>Choose product</option>
                <?php foreach ($barang as $brg) : ?>
                  <option <?= set_select('barang_id', $brg['id_barang']) ?> value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                <?php endforeach; ?>
              </select>
              <div class="input-group-append">
                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
              </div>
            </div>
            <?= form_error('id_barang', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 text-md-right" for="stok">Balance</label>
          <div class="col-md-9">
            <input readonly="readonly" name="stok" id="stok" type="number" class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 text-md-right" for="adjusment">Adjustment</label>
          <div class="col-md-9">
            <input value="<?= set_value('adjustment'); ?>" name="adjustment" id="adjustment" type="number" class="form-control" placeholder="Adjustment stock...">
            <?= form_error('adjusment', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 text-md-right" for="adjusment">Notes</label>
          <div class="col-md-9">
            <input value="<?= set_value('notes'); ?>" name="notes" id="notes" type="text" class="form-control" placeholder="Reason...">
            <?= form_error('notes', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-9 offset-md-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-secondary">Reset</bu>
          </div>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
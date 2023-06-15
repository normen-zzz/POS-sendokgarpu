<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Product
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['stok' => 0, 'id_barang' => $barang['id_barang'], 'user_id' => $this->session->userdata('login_session')['user']]); ?>
                <div class="row form-group">
                    <div class="col-md-4">
                        <input hidden value="<?= set_value('updatedd_at', date('Y-m-d h:i:s')); ?>" name="updatedd_at" id="updatedd_at" type="text">
                        <?= form_error('updatedd_at', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Product Name</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_barang', $barang['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Product Name...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jenis_id">Category Product</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="custom-select">
                                <option value="" selected disabled>Choose Category Product</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option <?= $barang['jenis_id'] == $j['id_jenis'] ? 'selected' : ''; ?> <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Stok</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('stok', $barang['stok']); ?>" name="stok" id="stok" readonly type="text" class="form-control" placeholder="Product Name...">
                        <?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Notes</label>
                    <div class="col-md-9">
                        <textarea name="notes" id="" cols="30" rows="10"><?= set_value('stok', $barang['notes']); ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <!-- <label class="col-md-3 text-md-right" for="nama_barang">Notes</label> -->
                    <div class="col-md-9">
                        <input hidden value="<?= date('Y-m-d h:i:s ') ?>" name="updated_stock" id="updated_stock" type="text" class="form-control" placeholder="Product Name...">
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
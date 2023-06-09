<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Add Category
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('jenis') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['user_id' => $this->session->userdata('login_session')['user']]); ?>
                <div class="row form-group">
                    <div class="col-md-4">
                        <input hidden value="<?= set_value('created_att', date('Y-m-d h:i:s')); ?>" name="created_att" id="created_att" type="text">
                        <?= form_error('created_att', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_jenis">Category Name</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_jenis'); ?>" name="nama_jenis" id="nama_jenis" type="text" class="form-control" placeholder="Category Name...">
                        <?= form_error('nama_jenis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
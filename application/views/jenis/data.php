<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Category Product
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('jenis/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Add Category Product
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($jenis) :
                    foreach ($jenis as $j) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $j['nama_jenis']; ?></td>
                            <td><?= $j['created_att']; ?></td>
                            <td><?= $j['updated_at']; ?></td>
                            <td><?= $j['nama']; ?></td>
                            <td>
                                <a href="<?= base_url('jenis/edit/') . $j['id_jenis'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you sure you want to delete data?')" href="<?= base_url('jenis/delete/') . $j['id_jenis'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
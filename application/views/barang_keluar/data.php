<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Product Out History
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('barangkeluar/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Add Product Out
                    </span>
                </a>
            </div>
        </div>
        <div class="mb-3">
            <label for="jenisFilter" class="form-label">Filter by Product Category:</label>
            <select class="form-control" id="jenisFilter">
                <option value="">All</option>
                <?php foreach ($jenis as $j) : ?>
                    <option value="<?= $j['nama_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap filter" id="DataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Product Out</th>
                    <th>Date</th>
                    <th>Balance</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($barangkeluar) :
                    foreach ($barangkeluar as $bk) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($bk['nama_barang'])); ?></td>
                            <td><?= $bk['nama_jenis']; ?></td>
                            <td><?= $bk['jumlah_keluar'] ?></td>
                            <td><?= $bk['tanggal_keluar']; ?></td>
                            <td><?= $bk['balance']; ?></td>
                            <td><?= $bk['nama']; ?></td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete data?')" href="<?= base_url('barangkeluar/delete/') . $bk['id_barang_keluar'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data not found
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        var table = $('#DataTable').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
            dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [100, 5, 10, 25, 50, -1],
                [100, 5, 10, 25, 50, "All"]
            ],
            columnDefs: [{
                targets: -1,
                orderable: false,
                searchable: false
            }]
        });

        table.buttons().container().appendTo('#DataTable_wrapper .col-md-5:eq(0)');

        $('#jenisFilter').on('change', function() {
            var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
            );

            table.column(2)
                .search(val ? '^' + val + '$' : '', true, false)
                .draw();
        });
    });
</script>

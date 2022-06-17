<main class="content" style="padding: 10px;">
    <!-- <div class="container" style="padding: 0px;"> -->

    <h1 class="h3 mb-2 ml-3">Data Reseller</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding: 15px;">

                    <?= $this->session->flashdata('pesan') ?>

                    <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-reseller">Tambah Reseller</button>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="20%">Nama</th>
                                    <th width="35%">Alamat</th>
                                    <th width="15%">No Telp</th>
                                    <th width="10%">Kelas</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($reseller as $sp) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $sp->nama ?></td>
                                        <td><?= $sp->alamat ?></td>
                                        <td><?= $sp->no_telp ?></td>
                                        <td><?= $sp->kelas ?></td>
                                        <td class="text-center">
                                            <a>
                                                <button onclick="edit(<?= $sp->id ?>)" class="badge btn-info">Edit</button>
                                            </a>
                                            <a>
                                                <button onclick="hapus(<?= $sp->id ?>)" class="badge btn-danger">Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- </div> -->
</main>

<!-- Modal add reseller -->
<div class="modal fade" id="modal-tambah-reseller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Reseller</h5>
                <button type="button" onclick="batal_tambah()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate autocomplete="off" id="form_tambah" method="POST" action="<?= base_url() ?>reseller/add_reseller_aksi">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Reseller</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="nama" name="nama" required>
                            <div class="invalid-feedback">Nama Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Alamat Reseller</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="alamat" name="alamat" required>
                            <div class="invalid-feedback">Alamat Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">No Telp Reseller</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="no_telp" name="no_telp" required>
                            <div class="invalid-feedback">No Telp Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kelas Reseller</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="kelas" name="kelas" required>
                                <option value="" selected>-- Pilih --</option>
                                <option value="Kelas 1">Kelas 1</option>
                                <option value="Kelas 2">Kelas 2</option>
                                <option value="Kelas 3">Kelas 3</option>
                                <option value="Kelas 4">Kelas 4</option>
                            </select>
                            <div class="invalid-feedback">Kelas Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-4 justify-content-center">
                        <div class="col-md-3 mb-3">
                            <button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onclick="batal_tambah()">Batal</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit reseller -->
<div class="modal fade" id="modal-edit-reseller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Reseller</h5>
                <button type="button" onclick="batal_edit()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate autocomplete="off" id="form_edit" method="POST" action="<?= base_url() ?>reseller/edit_reseller_aksi">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Reseller</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_nama" name="edit_nama" required>
                            <div class="invalid-feedback">Nama Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Alamat Reseller</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_alamat" name="edit_alamat" required>
                            <div class="invalid-feedback">Alamat Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">No Telp Reseller</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_no_telp" name="edit_no_telp" required>
                            <div class="invalid-feedback">No Telp Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kelas Reseller</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="edit_kelas" name="edit_kelas" required>
                                <option value="" selected>-- Pilih --</option>
                                <option value="Kelas 1">Kelas 1</option>
                                <option value="Kelas 2">Kelas 2</option>
                                <option value="Kelas 3">Kelas 3</option>
                                <option value="Kelas 4">Kelas 4</option>
                            </select>
                            <div class="invalid-feedback">Kelas Reseller harus diisi.</div>
                        </div>
                    </div>
                    <div class="row mt-5 mb-4 justify-content-center">
                        <div class="col-md-3 mb-3">
                            <button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onclick="batal_edit()">Batal</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);

        $('#dataTable').dataTable({
            "ordering": false
        });
    });





    // ADD DATA ----------------------------------------------------------------------------------- ADD DATA
    function batal_tambah() {
        $('#nama').val("");
        $('#alamat').val("");
        $('#no_telp').val("");
        $('#kelas').val("");
        $('#form_tambah').removeClass('was-validated')
    }
    // ADD DATA ----------------------------------------------------------------------------------- ADD DATA





    // EDIT DATA ----------------------------------------------------------------------------------- EDIT DATA
    function batal_edit() {
        $('#edit_nama').val("");
        $('#edit_alamat').val("");
        $('#edit_no_telp').val("");
        $('#edit_kelas').val("");
        $('#form_edit').removeClass('was-validated')
    }

    function edit(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>reseller/getResellerById/" + id,
            dataType: 'JSON',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_nama').val(response.nama);
                $('#edit_alamat').val(response.alamat);
                $('#edit_no_telp').val(response.no_telp);
                $('#edit_kelas').val(response.kelas);
                $('#modal-edit-reseller').modal('toggle');
            }
        })
    }
    // EDIT DATA ----------------------------------------------------------------------------------- EDIT DATA





    // HAPUS DATA ----------------------------------------------------------------------------------- HAPUS DATA
    function hapus(id) {
        Swal.fire({
            title: 'Yakin Mau Hapus?',
            text: "Data akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url() ?>reseller/hapus_reseller/' + id;
            }
        })
    }
    // HAPUS DATA ----------------------------------------------------------------------------------- HAPUS DATA
</script>
<?php
if (!session_id()) session_start();
//var_dump($_SESSION['flash']);
if (isset($_SESSION['flash'][2])) {
    echo "<div id='fls'></div>";
}
?>
<div class="container mt-5">
    <h3>Data Penduduk</h3>
    <hr>
    <div class="row">
        <div class="col">
            <form class="form-inline">
                <label class="sr-only" for="namaPenduduk">Nama Penduduk</label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" id="namaPenduduk" placeholder="Nama Penduduk">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-primary btn-primary text-light" style="cursor: pointer; border-radius: 0px 0.2rem 0.2rem 0px"><i class="fa fa-search" aria-hidden="true"></i></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <a href="<?= base_url('penduduk/form') ?>" class="btn btn-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
        </div>
    </div>
    <hr>
    <table class="table table-sm table-stripped table-bordered">
        <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($penduduk->num_rows() <= 0) { ?>
                <tr>
                    <td colspan="3">
                        <p>Data kosong</p>
                    </td>
                </tr>
            <?php } else { ?>
                <?php $i = 1; ?>
                <?php foreach ($penduduk->result() as $row) : ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $i ?></th>
                        <td>
                            <strong><?= str_pad(substr($row->nik, 0, 6), 16, 'X') ?></strong>
                        </td>
                        <td><?= $row->nama_lengkap ?></td>
                        <td>
                            <a class="badge badge-info text-light" data-toggle="modal" data-target="#detailPenduduk" onclick="get_detail('<?= $row->nik ?>', '<?= base_url() ?>');">Detail</a>
                            <a class="badge badge-success text-light">Edit</a>
                            <a class="badge badge-danger text-light" onclick="confirm_delete('<?= $row->nik ?>','<?= base_url() ?>');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="detailPenduduk" tabindex="-1" role="dialog" aria-labelledby="headerDetailPenduduk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img src="" id="pas" class="my-3 mx-auto" height="200px">
                </div>
                <table class="table table-sm" style="font-size: 12px;">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td id="nik" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td id="nama_lengkap" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td id="ttl" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td id="jenis_kelamin"></td>
                            <td>Gol Darah</td>
                            <td id="gol_darah"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td id="alamat" colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="pl-5">RT/RW</td>
                            <td id="rt_rw" colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="pl-5">Desa/Kelurahan</td>
                            <td id="des_kelurahan" colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="pl-5">Kecamatan</td>
                            <td id="kecamatan" colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="pl-5">Kabupaten</td>
                            <td id="kabupaten" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td id="agama" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td id="status" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td id="pekerjaan" colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td id="kewarganegaraan" colspan="3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 p-5 bg-light">
    <h2 class="display-5">Form Penduduk</h2>
    <hr>
    <form action="<?= base_url('penduduk/post_data') ?>" method="POST" id="formPenduduk" enctype="multipart/form-data">
        <div class="form-group row p-2">
            <div class="col">
                <label for="pas_foto">Pas Foto</label>
                <input type="file" name="pas_foto" class="form-control-file">
            </div>
            <div class="col">
                <label for="nik">NIK</label>
                <input type="text" class="form-control form-control-sm" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" autocomplete='Off' onkeyup="autotgl();">
            </div>
        </div>
        <div class="form-group p-2">
            <div class="row">
                <div class="col col-6">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete='Off'>
                </div>
                <div class="col">
                    <label for="nama_lengkap">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" autocomplete='Off'>
                </div>
                <div class="col">
                    <label for="tanggal_lahir">&nbsp;</label>
                    <input type="date" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir">
                </div>
            </div>
        </div>
        <div class="form-group row p-2">
            <div class="col">
                <label>Jenis Kelamin</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="rd_laki" value="laki-laki" checked>
                    <label class="form-check-label" for="rd_laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="rd_perempuan" value="perempuan">
                    <label class="form-check-label" for="rd_perempuan">Perempuan</label>
                </div>
            </div>
            <div class="col">
                <label>Golongan Darah</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gol_darah" id="rd_a" value="a">
                    <label class="form-check-label" for="rd_a">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gol_darah" id="rd_b" value="b">
                    <label class="form-check-label" for="rd_b">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gol_darah" id="rd_ab" value="ab">
                    <label class="form-check-label" for="rd_ab">AB</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gol_darah" id="rd_o" value="o">
                    <label class="form-check-label" for="rd_o">O</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gol_darah" id="rd_uk" value="uk" checked>
                    <label class="form-check-label" for="rd_uk">Tidak Diketahui</label>
                </div>
            </div>
        </div>
        <div class="form-group row p-2">
            <div class="col">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat / Nama Jalan" autocomplete='Off'>
            </div>
            <div class="col">
                <label for="nama_lengkap">RT / RW</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control form-control-sm" id="rt" name="rt" placeholder="Contoh. 01" autocomplete='Off'>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-sm" id="rw" name="rw" placeholder="Contoh. 02" autocomplete='Off'>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row p-2">
            <div class="col">
                <label for="desa_kelurahan">Desa / Kelurahan</label>
                <input type="text" class="form-control form-control-sm" id="desa_kelurahan" name="desa_kelurahan" placeholder="Desa / Kelurahan" autocomplete='Off'>
            </div>
            <div class="col">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" placeholder="Kecamatan" autocomplete='Off'>
            </div>
            <div class="col">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" class="form-control form-control-sm" id="kabupaten" name="kabupaten" placeholder="Kabupaten" autocomplete='Off'>
            </div>
        </div>
        <div class="form-group row p-2">
            <div class="col">
                <label for="agama">Agama</label>
                <select name="agama" id="agama" class="form-control form-control-sm">
                    <option value="" disabled selected>-- Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Khonghucu">Khonghucu</option>
                </select>
            </div>
            <div class="col">
                <label>Status Perkawinan</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan1" value="Belum Kawin" checked>
                    <label class="form-check-label" for="status_perkawinan1">Belum Kawin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan2" value="Kawin">
                    <label class="form-check-label" for="status_perkawinan2">Kawin</label>
                </div>
            </div>
            <div class="col">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control form-control-sm" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" autocomplete='Off'>
            </div>
            <div class="col">
                <label for="kewarganegaraan">Kewarganegaraan</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan1" value="WNI" checked>
                    <label class="form-check-label" for="kewarganegaraan1">WNI</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan2" value="WNA">
                    <label class="form-check-label" for="kewarganegaraan2">WNA</label>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i>
                Simpan
            </button>
            <button type="reset" class="btn btn-sm btn-danger">
                <i class="fa fa-ban"></i>
                Batal
            </button>
            <button type="button" class="btn btn-sm btn-secondary text-light" onclick="kembali('<?= base_url('penduduk/index') ?>')">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </button>
        </div>
    </form>
</div>

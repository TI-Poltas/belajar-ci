function get_detail(nik, base) {
	$.ajax({
		url: base + "penduduk/get_detail",
		data: {
			nik: nik
		},
		method: 'post',
		dataType: 'json',
		success: function (data) {
			$('#nik').html(data.nik);
			$('#nama_lengkap').html(data.nama_lengkap);
			var d = new Date(data.tanggal_lahir),
				month = '' + (d.getMonth() + 1),
				day = '' + d.getDate(),
				year = d.getFullYear();
			if (month.length < 2)
				month = '0' + month;
			if (day.length < 2)
				day = '0' + day;
			tgl = [day, month, year].join('-');
			$('#ttl').html(data.tempat_lahir + ', ' + tgl);
			$('#jenis_kelamin').html(data.jenis_kelamin);
			$('#gol_darah').html(data.gol_darah);
			$('#alamat').html(data.alamat);
			$('#rt_rw').html(data.rt + '/' + data.rw);
			$('#des_kelurahan').html(data.desa_kelurahan);
			$('#kecamatan').html(data.kecamatan);
			$('#kabupaten').html(data.kabupaten);
			$('#agama').html(data.agama);
			$('#status').html(data.status_perkawinan);
			$('#pekerjaan').html(data.pekerjaan);
			$('#kewarganegaraan').html(data.kewarganegaraan);
			$('#pas').attr('src', base + data.foto);
		}
	});
}

function confirm_delete(nik, base) {
	Swal.fire({
		title: 'Sampeyan yakin?',
		text: "Data bakal dibusak lan sampeyan ora bisa mulihake maneh",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Nggih',
		cancelButtonText: 'Ora'
	}).then((result) => {
		if (result.value) {
			url = base + "penduduk/hapus_penduduk/" + nik;
			window.location = url;
		}
	});
}

function sukses(head, msg) {
	Swal.fire(
		head,
		msg,
		'success'
	)
}

function gagal(head, msg) {
	Swal.fire(
		head,
		msg,
		'error'
	)
}

function kembali(link) {
	var isi = 0;
	if ($('#nik').val() != '')
		isi++;
	if ($('#nama_lengkap').val() != '')
		isi++;
	if ($('#tempat_lahir').val() != '')
		isi++;
	if ($('#tanggal_lahir').val() != '')
		isi++;
	if ($('#alamat').val() != '')
		isi++;
	if ($('#rt').val() != '' || $('#rw').val() != '')
		isi++;
	if ($('#desa_kelurahan').val() != '' || $('#kecamatan').val() != '' || $('#kabupaten').val() != '')
		isi++;
	if ($('#agama option:selected').val() != '')
		isi++;
	if ($('#pekerjaan').val() != '')
		isi++;
	if (isi > 0)
		confirm_back(link);
	else
		window.location = link;
}

function confirm_back(link) {
	Swal.fire({
		title: 'Sampeyan Yakin Sampeyan Wis Bali?',
		text: "Data sing sampeyan lebokake durung disimpen",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Nggih',
		cancelButtonText: 'Ora'
	}).then((result) => {
		if (result.value) {
			window.location = link;
		}
	})
}
var tgl = '';
function autotgl() {
	const nik = $('#nik').val();
	var res = nik.split('');
	if (res.length >= 12) {
		if (parseInt(res[6] + res[7]) > 40) {
			day = parseInt(res[6] + res[7]) - 40;
		} else {
			day = parseInt(res[6] + res[7])
		}
		day = day.toString();
		if (parseInt(res[10] + res[11]) <= 19) {
			tgl = '20' + res[10] + res[11] + '-' + res[8] + res[9] + '-' + day;
		} else {
			tgl = '19' + res[10] + res[11] + '-' + res[8] + res[9] + '-' + day;
		}
		$('#tanggal_lahir').val(tgl);
	}
}

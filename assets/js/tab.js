$('.hapus-tab').on('click', function (e) {
	e.preventDefault();

	var href = $(this).attr('href');
	var tab = $(this).data('tab');

	Swal.fire({
		title: 'Apakah Anda Yakin?',
		text: "Tab " + tab + " akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#dc3545',
		cancelButtonColor: '#28a745',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$('.hapus-sub_tab').on('click', function (e) {
	e.preventDefault();

	var href = $(this).attr('href');
	var tab = $(this).data('sub');

	Swal.fire({
		title: 'Apakah Anda Yakin?',
		text: tab + " akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#dc3545',
		cancelButtonColor: '#28a745',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

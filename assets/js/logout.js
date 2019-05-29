$('.keluar').on('click', function (e) {

	e.preventDefault();
	var href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah Anda Yakin?',
		text: "Sesi sebelumnya tidak akan dimuat lagi",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#dc3545',
		cancelButtonColor: '#28a745',
		confirmButtonText: 'Keluar',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

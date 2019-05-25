function jam() {
	const w = new Date();
	var j = w.getHours();
	var m = w.getMinutes();
	var d = w.getSeconds();

	m = cekw(m);
	d = cekw(d);

		$('.jam').html(j + ':' + m + ':' + d);

	var t = setInterval(jam, 500);
}

function cekw(i) {
	if (i < 10) {
		i = "0" + i;
	}

	return i;
}

jam();

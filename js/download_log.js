$(document).ready(function(){

	//hilangkan tombol cari
	// // $('#tombol-cari').hide();
	// var tabel = $('.tabel').val();


	//event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		//munculkan icon loading
		
		$('.loader').show();
		//ajax menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		//$.get()
		$.get('ajax/download_ajax.php?keyword=' + $('#keyword').val(), function(data){
			$('#container').html(data);
			$('.loader').hide();
		});
	});
});
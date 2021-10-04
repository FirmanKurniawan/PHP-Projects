// file preview
function previewFoto(){
	const foto = document.querySelector('.foto-preview'); //img
    const fileFoto = document.querySelector('.file-foto'); //input
    const labelFoto = document.querySelector('.label-foto'); //label

    // Merubah label pada inputan
    labelFoto.textContent = fileFoto.files[0].name;

    // Membuat FileReader untuk mengganti nama URL pada input file foto
    const img = new FileReader();

    // Mengganti preview foto yang dipilih
    img.readAsDataURL(fileFoto.files[0]);

    img.onload = function(e) {
        foto.src = e.target.result;
    } 
}

$('.counter').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 2000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

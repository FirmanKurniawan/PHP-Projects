// the target size
var TARGET_W = 600;      /*to set cropping width and height area*/
var TARGET_H = 600;

// show loader while uploading photo
function submit_photo() {
	// display the loading texte
	$('#loading_progress').html('<img src="images/loader.gif"> Uploading your photo...');
}

// show_popup : show the popup
function show_popup(id) {
	// show the popup
	$('#'+id).show();
}

// close_popup : close the popup
function close_popup(id) {
	// hide the popup
	$('#'+id).hide();
}

// show_popup_crop : show the crop popup
function show_popup_crop(url) {
	// change the photo source
	$('#cropbox').attr('src', url);
	// destroy the Jcrop object to create a new one
	try {
		jcrop_api.destroy();
	} catch (e) {
		// object not defined
	}
	// Initialize the Jcrop using the TARGET_W and TARGET_H that initialized before
    $('#cropbox').Jcrop({
      aspectRatio: TARGET_W / TARGET_H,
      setSelect:   [ 100, 100, TARGET_W, TARGET_H ],
      onSelect: updateCoords
    },function(){
        jcrop_api = this;
    });

    // store the current uploaded photo url in a hidden input to use it later
	$('#photo_url').val(url);
	// hide and reset the upload popup
	$('#popup_upload').hide();
	$('#loading_progress').html('');
	$('#photo').val('');

	// show the crop popup
	$('#popup_crop').show();
}

// crop_photo : 
function crop_photo() {
	var x_ = $('#x').val();
	var y_ = $('#y').val();
	var w_ = $('#w').val();
	var h_ = $('#h').val();
	var photo_url_ = $('#photo_url').val();

	// hide thecrop  popup
	$('#popup_crop').hide();

	// display the loading texte
	$('#photo_container').html('<img src="images/loader.gif"> Processing...');
	// crop photo with a php file using ajax call
	$.ajax({
		url: 'crop_photo.php',
		type: 'POST',
		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
		success:function(data){
			// display the croped photo
			$('#photo_container').html(data);
		}
	});
}

// updateCoords : updates hidden input values after every crop selection
function updateCoords(c) {
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
}


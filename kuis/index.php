<?php
include 'koneksi.php';
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<title>Kuis</title>
<link href="config/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="config/bootstrap/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
<link href="config/bootstrap/dist/css/bootstrapValidator.min.css" type="text/css" rel="stylesheet">

<link href="config/css/main.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="config/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="config/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="config/bootstrap/js/bootbox.min.js"></script>
<script type="text/javascript" src="config/bootstrap/dist/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="config/js/inputnumber.js"></script>
</head>
<body>
<div class="table-responsive" style="margin-bottom:50px;">
  <form id="taruhanForm" name="submit" action="javascript:simpanForm()"  method="post"  role="form" >
    <input type="button" id="add_item" value="+ add item"  class="btn btn-primary" onClick="tambahBaris()">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th width="" style="text-align:center">#</th>
          <th width="" style="text-align:center">Pasang</th>
          <th width="" style="text-align:center">Tebakan</th>
          <th width="" style="text-align:center">Taruhan</th>
          <th width="" style="text-align:center">Bayar</th>
		      <th width="" style="text-align:center">Aksi</th>
        </tr>
      </thead>
      <tbody id="data_barang">
	  <input type="hidden" name="id_player" value="1">
	  <input type="hidden" name="no_faktur_4d" value="001">
	  
      </tbody>
      <tfoot>
        <tr style="border-bottom:1px solid #DDD;background:#F5F5F5">
          <td colspan="4" style="text-align:right;padding-top:15px;"><b>Total Bayar</b></td>
          <td><div class="form-group" style="margin-bottom:0px;">
              <input style="background:#FFF" readonly placeholder="Rp" class="form-control" name="totalbayar" id="totalbayar" type="text" autocomplete="off" required>
            </div></td>
        </tr>
      </tfoot>
    </table>
    <style type="text/css">
	.checksetuju .form-control-feedback {
		top: -5px;
		right: -25px;
	}
	</style>
    <center>
      <div class="form-group checksetuju" style="width:525px;">
        <label class="control-label" style="cursor:pointer">
          <input type="checkbox" id="setuju" name="setuju" value="setuju"  onclick="totalForm()">
          Setuju dengan peraturan kami dan sudah yakin dengan taruhan anda ?</label>
      </div>
      <button name="pasang" type="submit" name="simpan" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" style="margin-right:5px;"></span>Pasang</button>
	    <button name="reset" type="reset" name="reset" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" style="margin-right:5px;"></span>Reset</button>
    </center>
  </form>
</div>
<script type="text/javascript">
var form = $('#taruhanForm');
$(document).ready(function(){
   
 
    
    form.submit(function(e){
        $.ajax({
            url : 'validate-form7.php',
            type : 'POST',
            data : form.serialize(),
            success : function(data){
                var result = $.trim(data);
                if(result == 'yes'){
                    simpanForm();
                }else{
                    alert('Mohon Maaf Data Anda Belum Tersimpan');
                }
            },
            error : function(data){
                alert(data);
            }
        });


        e.preventDefault();
    });
    
});

function simpanForm(){
        $.ajax({
            url : 'simpan-form6.php',
            type : 'POST',
            data : form.serialize(),
            success : function(data){
                var result = $.trim(data);
                alert(result);
                $('#reset').click();
            },
            error : function(data){
                alert(data);
            }
        });

}
var i =  0  ;

function tambahBaris(){
	
	if(i > 99){
		alert("Maksimal Pasang Taruhan 100")
		return false;
	};	
	var tr1 = '<tr id="baris'+i+'" class="baris" index="'+i+'">';
	var tr2 = '</tr>';
    var td = '';
    td += '<td id="nomor'+i+'" class="nomor" style="padding-top:14px;cursor:pointer;" title="Pasang #'+i+'" >'+i+'</td>';
	
	
 td += '<td style="padding-top:14px;cursor:pointer;" title="Pasang #'+i+'" onclick="enableForm('+i+')"><input type="checkbox" name="pilih['+i+']"   onclick="enableForm('+i+')"></td>';
 
 
	td += '<td><div class="form-group" style="margin-bottom:0px;"><input disabled placeholder="ABCD" class="form-control" name="tebak['+i+']" id="tebak'+i+'" type="text" autocomplete="off" maxlength="4"></div></td>';
	
	 td += '<td><div class="form-group" style="margin-bottom:0px;"><input disabled placeholder="Rp" class="form-control" name="taruhan['+i+']" id="taruhan'+i+'"  type="text" autocomplete="off" onkeyup="totalForm()"></div></td>';
	 
	 td += '<td><div class="form-group" style="margin-bottom:0px;"><input readonly disabled placeholder="Rp" class="form-control" name="bayar['+i+']"  id="bayar'+i+'" type="text" autocomplete="off"></div></td>';
  
    td += '<td><input type="button"  class="btn btn-primary" name="hapus_barang'+i+'" value="hapus" onClick="hapusBaris('+i+')"></td>';

    $('#data_barang').append(tr1 + td + tr2);
		
    i++;
    buatPenomoran();
};

function buatPenomoran(){
    var no =1;
    $.each($('.nomor'), function(key, value){
       $(this).html(no);
       no++;
    });
}
function hapusBaris(index){
    $('#baris'+index).remove();
    buatPenomoran();
    totalForm();
}
function enableForm(i){
	$('input[name="taruhan['+i+']"]').priceFormat();
	$('#taruhanForm')
		.bootstrapValidator({
			// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
			excluded: [':disabled', ':hidden', ':not(:visible)'], 
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				setuju: {
					message: 'Anda harus setuju terlebih dahulu !',
					validators: {
						notEmpty: {}
					}
				},
				totalbayar: {
					message: 'Tidak ada taruhan !',
					validators: {
						notEmpty: {},
						callback: {
							callback: function(value, validator, $field) {
								var hasil = $('input[name="totalbayar"]').val().replace(/\./g,'');
								if(hasil==0)
								{
									return { valid:false, message:'Tidak ada taruhan !' };
								}
								else if(hasil> 20000000)
								{
									return { valid:false, message:'Saldo tidak cukup !' };
								}
								else
								{
									return true;
								}
							}
						}
					}
				},


					"tebak[0]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[1]": {
					
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
							
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
						
					}
				},
					"tebak[2]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[3]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[4]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[5]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[6]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[7]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[8]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[9]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[10]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[11]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[12]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[13]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[14]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[15]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[16]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[17]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[18]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[19]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},	
					"tebak[20]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[21]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[22]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[23]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[24]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[25]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[26]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[27]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[28]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[29]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[30]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[31]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[32]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[33]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[34]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[35]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[36]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[37]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[38]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[39]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[40]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[41]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[42]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[43]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},			
					"tebak[44]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},				
					"tebak[45]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[46]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[47]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[48]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[49]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[50]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[51]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[52]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[53]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[54]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[55]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[56]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[57]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},	
					"tebak[58]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[59]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[60]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[61]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[62]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[63]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[64]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[65]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[66]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[67]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[68]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[69]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[70]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[71]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[72]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[73]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[74]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[75]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[76]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[77]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[78]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[79]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[80]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[81]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[82]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[83]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[84]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[85]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[86]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[87]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[88]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[89]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[90]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[91]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[92]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[93]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[94]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[95]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[96]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[97]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[98]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					"tebak[99]": {
					message: 'Tebakan masih kosong !',
					validators: {
						notEmpty: {},
						stringLength: {
							min: 4,
							max: 4,
							message: 'Tebakan harus 4 digit !'
						},
						regexp: {regexp: /^[0-9]+$/, message: 'Tebakan harus angka !'}
					}
				},
					
					
					
					
					"taruhan[0]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[0]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[0]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[0]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[0]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[0]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[1]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[1]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[1]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[1]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[1]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[1]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[2]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[2]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[2]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[2]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[2]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[3]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[3]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[3]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[3]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[3]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[3]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[3]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[4]": {
					message: 'Taruhanmasih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[4]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[4]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[4]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[4]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[4]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[5]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[5]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[5]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[5]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[5]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[5]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[6]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[6]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[6]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[6]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[6]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[6]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[7]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[7]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[7]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[7]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[7]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[7]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[8]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[8]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[8]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[8]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[8]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[8]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[9]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[9]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[9]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[9]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[9]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[9]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[10]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[10]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[10]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[10]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[10]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[10]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[11]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[11]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[11]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[11]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[11]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[11]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[12]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[12]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[12]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[12]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[12]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[12]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},	
					"taruhan[13]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[13]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[13]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[13]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[13]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[13]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},			
					"taruhan[14]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[14]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[14]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[14]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[14]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[14]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},				
					"taruhan[15]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[15]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[15]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[15]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[15]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[15]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[16]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[16]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[16]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[16]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[16]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[16]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[17]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[17]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[17]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[17]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[17]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[17]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[18]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[18]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[18]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[18]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[18]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[18]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[19]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[19]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[19]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[19]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[19]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[19]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[20]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[20]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[20]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[20]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[20]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[20]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[21]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[21]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[21]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[21]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[21]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[21]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[22]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[22]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[22]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[22]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[22]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[22]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[23]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[23]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[23]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[23]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[23]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[23]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[24]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[24]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[24]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[24]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[24]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[24]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[25]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[25]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[25]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[25]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[25]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[25]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[26]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[26]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[26]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[26]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[26]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[26]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[27]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[27]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[27]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[27]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[27]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[27]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[28]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[28]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[28]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[28]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[28]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[28]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[29]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[29]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[29]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[29]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[29]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[29]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[30]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[30]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[30]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[30]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[30]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[30]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[31]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[31]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[31]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[31]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[31]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[31]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[32]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[32]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[32]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[32]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[32]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[32]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[33]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[33]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[33]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[33]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[33]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[33]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[34]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[34]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[34]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[34]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[34]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[34]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[35]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[35]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[35]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[35]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[35]"]').val( 0 );

									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[35]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[36]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[36]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[36]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[36]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[36]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[36]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[37]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[37]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[37]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[37]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[37]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[37]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[38]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[38]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[38]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[38]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[38]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[38]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[39]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[39]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[39]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[39]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[39]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[39]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[40]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[40]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[40]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[40]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[40]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[40]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[41]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[41]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[41]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[41]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[41]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[41]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},				
					"taruhan[42]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[42]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[42]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[42]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[42]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[42]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},				
					"taruhan[43]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[43]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[43]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[43]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[43]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[43]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[44]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[44]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[44]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[44]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[44]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[44]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[45]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[45]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[45]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[45]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[45]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[45]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[46]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[46]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[46]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[46]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[46]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[46]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[47]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[47]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[47]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[47]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[47]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[47]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[48]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[48]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[48]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[48]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[48]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[48]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[49]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[49]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[49]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[49]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[49]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[49]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[50]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[50]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[50]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[50]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[50]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[50]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},	
					"taruhan[51]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[51]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[51]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[51]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[51]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[51]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[52]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[52]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[52]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[52]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[52]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[52]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[53]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[53]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[53]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[53]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[53]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[53]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[54]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[54]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[54]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[54]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[54]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[54]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[55]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[55]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[55]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[55]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[55]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[55]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[56]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[56]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[56]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[56]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[56]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[56]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[57]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[57]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[57]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[57]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[57]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[57]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[58]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[58]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[58]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[58]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[58]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[58]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[59]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[59]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[59]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[59]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[59]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[59]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[60]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[60]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[60]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[60]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[60]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[60]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[61]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[61]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[61]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[61]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[61]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[61]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[62]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[62]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[62]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[62]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[62]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[62]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[63]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[63]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[63]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[63]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[63]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[63]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[64]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[64]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[64]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[64]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[64]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[64]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[65]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[65]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[65]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[65]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[65]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[65]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[66]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[66]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[66]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[66]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[66]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[66]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[67]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[67]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[67]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[67]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[67]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[67]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[68]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[68]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[68]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[68]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[68]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[68]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},	
					"taruhan[69]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[69]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[69]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[69]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[69]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[69]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[70]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[70]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[70]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[70]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[70]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[70]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[71]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[71]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[71]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[71]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[71]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[71]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[72]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[72]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[72]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[72]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[72]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[72]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[73]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[73]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[73]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[73]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[73]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[73]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[74]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[74]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[74]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[74]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[74]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[74]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[75]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[75]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[75]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[75]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[75]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[75]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[76]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[76]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[76]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[76]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[76]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[76]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[77]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[77]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[77]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[77]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[77]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[77]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[78]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[78]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[78]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[78]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[78]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[78]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[79]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[79]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[79]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[79]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[79]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[79]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[80]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[80]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[80]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[80]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[80]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[80]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[81]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[81]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[81]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[81]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[81]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[81]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[82]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[82]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[82]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[82]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[82]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[82]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[83]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[83]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[83]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[83]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[83]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[83]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[84]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[84]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[84]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[84]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[84]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[84]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[85]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[85]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[85]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[85]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[85]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[85]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[86]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[86]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[86]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[86]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[86]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[86]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[87]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[87]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[87]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[87]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[87]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[87]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[88]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[88]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[88]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[88]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[88]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[88]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[89]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[89]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[89]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[89]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[89]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[89]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[90]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[90]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[90]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[90]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[90]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[90]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[91]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[91]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[91]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[91]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[91]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[91]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[92]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[92]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[92]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[92]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[92]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[92]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[93]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[93]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[93]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[93]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[93]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[93]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[94]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[94]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[94]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[94]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[94]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[94]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[95]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[95]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[95]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[95]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[95]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[95]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[96]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[96]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[96]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[96]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[96]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[96]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[97]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[97]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[97]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[97]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[97]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[97]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[98]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[98]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[98]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[98]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[98]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[98]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				},
					"taruhan[99]": {
					message: 'Taruhan masih kosong !',
					validators: {
						notEmpty: {},
						regexp: {regexp: /^[0-9\.]+$/, message: 'Taruhan hanya angka !'},
						callback: {
                            message: 'Taruhan masih kosong !',
                            callback: function(value, validator, $field) {
								var hasil = $('input[name="taruhan[99]"]').val().replace(/\./g,'');
								if(hasil<1000)
								{
									$('input[name="bayar[99]"]').val( 0 );
									return { valid:false, message:'Taruhan minimal 1.000 !' };
								}
								else if(hasil>100000000)
								{
									$('input[name="bayar[99]"]').val( 0 );
									return { valid:false, message:'Taruhan maksimal 100.000.000 !' };
								}
								else if(hasil%1000!=0)
								{
									$('input[name="bayar[99]"]').val( 0 );
									return { valid:false, message:'Taruhan harus kelipatan 1.000 !' };
								}
								else
								{
									hasil -= Math.round( (hasil*70.00/100), 0 );
									$('input[name="bayar[99]"]').val( hasil ).priceFormat();
									return true;
								}
                            }
                        }
					}
				}
				
			}
		})
		.on('error.validator.bv', function(e, data) {
            // $(e.target)    --> The field element
            // data.bv        --> The BootstrapValidator instance
            // data.field     --> The field name
            // data.element   --> The field element
            // data.validator --> The current validator name
            data.element
                .data('bv.messages')
                // Hide all the messages
                .find('.help-block[data-bv-for="' + data.field + '"]').hide()
                // Show only message associated with current validator
                .filter('[data-bv-validator="' + data.validator + '"]').show();
        })
		.on('status.field.bv', function(e, data) {
            // $(e.target)  --> The field element
            // data.bv      --> The BootstrapValidator instance
            // data.field   --> The field name
            // data.element --> The field element
            data.bv.disableSubmitButtons(false);
        });
		
		
	var check = $('input[name="pilih['+i+']"]').prop( "checked" );
	$('input[name="pilih['+i+']"]').prop( "checked", !check );
	if( $('input[name="pilih['+i+']"]').prop( "checked" ) )
	{
		$('input[name="tebak['+i+']"]').prop('disabled', false);
		$('input[name="tebak['+i+']"]').focus();
		$('input[name="taruhan['+i+']"]').prop('disabled', false);
		$('input[name="bayar['+i+']"]').prop('disabled', false);
		$('input[name="bayar['+i+']"]').css("background","#FFF");
		$('input[name="setuju"]').prop('checked', false);
		$('#taruhanForm').bootstrapValidator('resetField', 'setuju');
	}
	else
	{
		$('#taruhanForm').bootstrapValidator('resetField', 'tebak'+i);
		$('#taruhanForm').bootstrapValidator('resetField', 'taruhan'+i);
		$('input[name="tebak['+i+']"]').val('');
		$('input[name="tebak['+i+']"]').prop('disabled', true);
		$('input[name="taruhan['+i+']"]').val('');
		$('input[name="taruhan['+i+']"]').prop('disabled', true);
		$('input[name="bayar['+i+']"]').val('');
		$('input[name="bayar['+i+']"]').prop('disabled', true);
		$('input[name="bayar['+i+']"]').css("background","#EEE");
		$('input[name="setuju"]').prop('checked', false);
		$('#taruhanForm').bootstrapValidator('resetField', 'setuju');
		totalForm();
	}
};

function totalForm(){

	    var total = 0;
    	$.each($('.baris'), function(k, v){
        var index = $(this).attr('index');
		 var hasil = parseInt($('#taruhan'+index).val().replace(/\./g,''));
		 
		var ok =  hasil - (hasil * 70.00 /100);
        total += ok;

        $('#bayar'+index).val(ok).priceFormat();
		
    });
	
    $('#totalbayar').val(total).priceFormat();
	$('#taruhanForm').bootstrapValidator('updateStatus', 'totalbayar', 'NOT_VALIDATED');
	$('#taruhanForm').bootstrapValidator('validateField', 'totalbayar');
	
	
};


</script>
</div>
</div>
<!-- FOOTER -->
<hr>
</hr>
</div>

</body>
</html>
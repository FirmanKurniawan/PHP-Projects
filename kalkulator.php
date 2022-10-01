<!--/*
 *       http://learnbasic.id1945.com/
 * 		 http://lholhox.wordpress.com/
 *  Use is subject to license terms.
 */
/**
 *
 * @Raden Mas Lholhox
* -->

 <html>
	<head>
		<title>Simple Kalkulator</title>
	</head>
		<body>
			
			<table width="434" height="86" border="2" bordercolor="#FF0000">
				<tr>
					<td align="center" valign="middle"><table width="416" border="0">
						<tr>
							<td height="43" colspan="4" align="center" bgcolor="#D0E382"> 
							<span class="style2">Kalkulator Sederhana Dengan PHP </span></td>
						</tr>
							<tr>
								<td height="41" align="center">&nbsp;</td>
							</tr>
<?php
	$nilaiA = $_POST['nilaiA'];
	$nilaiB = $_POST['nilaiB'];
	$operator = $_POST['operator'];
	
	
		if ($operator == 'Pilih Operator'){
			echo "<span style='font-size:15px; color:red;'>anda belum memilih operator<br></span>";
			}
		if ($operator == '+') {
			$eksekusi=$nilaiA + $nilaiB;
			}
		if ($operator == '-') {
			$eksekusi=$nilaiA - $nilaiB;
			}
		if ($operator == '*') {
			$eksekusi=$nilaiA * $nilaiB;
			}
		if ($operator == '/') {
			$eksekusi=$nilaiA / $nilaiB;
			}
				
	echo "Hasil <br>";
	echo "$nilaiA ";
	echo "$operator ";
	echo "$nilaiB ";
	echo "= ";
	echo "$eksekusi";
?>
				
				
							</table>
					</td>
				</tr>
			</table>
			
		</body>
</html>

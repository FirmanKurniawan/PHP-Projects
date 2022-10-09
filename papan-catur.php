<!DOCTYPE html>
<html>
<head>
	<title>Papan catur</title>
</head>
<body bgcolor="#aaa">
	<table border="1" cellpadding="20" cellspacing="0" align="center">
		<?php for( $baris = 1; $baris <= 8; $baris++ ) : ?>
			<tr>

				

				<?php for( $kolom = 1; $kolom <= 8; $kolom++ ) : ?>	
					<?php if( ($baris + $kolom) % 2 == 0 ) { ?>

						<td bgcolor="white"></td>

					<?php } else { ?>
						<td bgcolor="black"></td>

					<?php } ?>
				<?php endfor; ?>



			</tr>
		<?php endfor; ?>
	</table>
</body>
</html>

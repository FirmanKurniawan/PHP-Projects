<!DOCTYPE html>
<html>
<head>
	<title>Simple Spin Text</title>
	<style type="text/css">
	#wrapper {
		margin: 0 auto;
		max-width: 450px;
		text-align: center;
	}
	.form-container {
		text-align: left;
	}
	.form-control {
		padding: 10px;
		margin: 10px 0;
		width: 100%;
	}
	.form-button {
		padding: 10px;
		background: #333;
		border: none;
		color: #fff;
		text-decoration: none;
	}
</style>
</head>
<body>

	<div id="wrapper">		
		<h1>
			Simple Spin Text
		</h1>

		<?php if ($_POST): ?>			
			<?php 
			require "SpintaxClass.php";
			$spintax = new Spintax();
			$count = $_POST['count'];
			$res = '';
			for ($i=0; $i < $count ; $i++) { 
				$res .= $spintax->process($_POST['text']).PHP_EOL;
			}
			?>
			<div class="form-container">				
				<div>
					<label>Result Spin</label>
					<textarea required="" rows="10" class="form-control" name="text"><?php echo $res; ?></textarea>
				</div>
				<div>
					<a class="form-button" href="./">Create Again</a>
				</div>
			</div>
			<?php else: ?>
				<form class="form-container" method="POST">
					<div>
						<label>Text to Spin</label>
						<textarea required="" rows="10" class="form-control" name="text" placeholder="insert spintax">{Hello|Howdy|Hola} to you, {Mr.|Mrs.|Ms.} {Smith|Williams|Davis}!</textarea>
					</div>
					<div>
						<label>Count Spin</label>
						<input required="" class="form-control" type="number" name="count" value="1" placeholder="count spin ?">
					</div>
					<div>
						<button class="form-button" type="submit">Generate</button>
					</div>
				</form>
			<?php endif ?>
		</div>

	</body>
	</html>
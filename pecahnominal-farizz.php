<form action="" method="POST">
<input type="number" name="nom">
<input type="submit" name="submit" value="Pecah">
</form>

<?php
if(isset($_POST["submit"])){
	
	$nom = $_POST["nom"];
	
	echo number_format($nom)."<br><br>";
	
	//100k
	$pecah1 = $nom/100000;
	$sisa1 = $nom%100000;
	if($pecah1 >= 1){
	echo "100rb = ".(int)$pecah1." Lembar<br>";
	}
	
	//50k
	$pecah2 = $sisa1/50000;
	$sisa2 = $sisa1%50000;
	if($pecah2 >= 1){
	echo "50rb = ".(int)$pecah2." Lembar<br>";
	}
	
	//20k
	$pecah3 = $sisa2/20000;
	$sisa3 = $sisa2%20000;
	if($pecah3 >= 1){
	echo "20rb = ".(int)$pecah3." Lembar<br>";
	}
	
	//10k
	$pecah4 = $sisa3/10000;
	$sisa4 = $sisa3%10000;
	if($pecah4 >= 1){
	echo "10rb = ".(int)$pecah4." Lembar<br>";
	}
	
	//5k
	$pecah5 = $sisa4/5000;
	$sisa5 = $sisa4%5000;
	if($pecah5 >= 1){
	echo "5rb = ".(int)$pecah5." Lembar<br>";
	}
	
	//2k
	$pecah6 = $sisa5/2000;
	$sisa6 = $sisa5%2000;
	if($pecah6 >= 1){
	echo "2rb = ".(int)$pecah6." Lembar<br>";
	}
	
	//1k
	$pecah7 = $sisa6/1000;
	$sisa7 = $sisa6%1000;
	if($pecah7 >= 1){
	echo "1rb = ".(int)$pecah7." Lembar<br>";
	}
	
	//500 
	$pecah8 = $sisa7/500;
	$sisa8 = $sisa7%500;
	if($pecah8 >= 1){
	echo "500 = ".(int)$pecah8." Koin<br>";
	}
	if($sisa8 != 0){
	echo "Yang Tidak Bisa Di Pecah : ".$sisa8;
	}
}
?>

<?php

$page_title = "Conversion ";

ob_start();

?>


<div>
	<h3 >Conversion d'Euros</h3>
	<hr style="border-top:1px dotted #000;"/>
	<form method="POST" action="">
		<div>
		<label >Euro:</label>
			<input type="text" name="e_digit"/>
			<label>Choix de la monnaie : </label>
			<select name="e_currency">
				<option value="">Selection de la monnaie</option>
				<option value="Dollar americain">Dollar americain</option>
				<option value="Livre Sterling">Livre Sterling</option>
				<option value="Bitcoin">Bitcoin</option>
				<option value="Dollar australien">Dollar australien</option>
				<option value="Yen japonais">Yen japonais</option>
			</select>
			<br /><br />
			<center><button type="submit" name="e_submit" style="width:30%;">Conversion</button></center>
			<br />
			
		</div>

	</form>
</div>



<div>
	<h3 >Conversion de Bitcoin</h3>
	<hr style="border-top:1px dotted #000;"/>
	<form method="POST" action="">
		<div>
		<label >Bitcoin:</label>
			<input type="text" name="b_digit"/>
			<label>Choix de la monnaie : </label>
			<select name="b_currency">
				<option value="">Selection de la monnaie</option>
				<option value="Dollar americain">Dollar americain</option>
				<option value="Livre Sterling">Livre Sterling</option>
				<option value="Euro">Euro</option>
				<option value="Dollar australien">Dollar australien</option>
				<option value="Yen japonais">Yen japonais</option>
			</select>
			<br /><br />
			<center><button type="submit" name="b_submit" style="width:30%;">Conversion</button></center>
			<br />
			
		</div>

	</form>
</div>



<div>
	<h3 >Conversion de Dollars</h3>
	<hr style="border-top:1px dotted #000;"/>
	<form method="POST" action="">
		<div>
			<label >Dollar:</label>
			<input type="text" name="txt_digit"/>
			<label>Choix de la monnaie : </label>
			<select name="d_currency">
				<option value="">Selection de la monnaie</option>
				<option value="Euro">Euro</option>
				<option value="Livre Sterling">Livre Sterling</option>
				<option value="Bitcoin">Bitcoin</option>
				<option value="Dollar australien">Dollar australien</option>
				<option value="Yen japonais">Yen japonais</option>
			</select>
			<br /><br />
			<center><button type="submit" name="d_submit" style="width:30%;">Conversion</button></center>
			<br />
			
		</div>

	</form>
</div>






<?php
//euro
if(ISSET($_POST['e_submit'])){
	$digit = $_POST['e_digit'];
	$currency = $_POST['e_currency'];
	if($digit != ""){
		switch($currency){ 
			
			case "Dollar americain":
				$output = $digit * 1.08;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."$</label></center>";
			break;
			
			case "Livre Sterling":
				$output = $digit * 0.89;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."£</label></center>";
			break;
			
			case "Bitcoin":
				$output = $digit * 0.000059;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."&#8383;</label></center>";
			break;
			
			case "Dollar australien":
				$output = $digit * 1.56;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."$</label></center>";
			break;
			
			case "Yen japonais":
				$output = $digit * 140.61;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."&#165;</label></center>";
			break;
		}
	}
}

?>


<?php
// bitcoin
if(ISSET($_POST['b_submit'])){
	$digit = $_POST['b_digit'];
	$currency = $_POST['b_currency'];
	if($digit != ""){
		switch($currency){ 
			
			case "Dollar americain":
				$output = $digit * 18258.80;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."$</label></center>";
			break;
			
			case "Livre Sterling":
				$output = $digit * 15031.01;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."£</label></center>";
			break;
			
			case "Euro":
				$output = $digit * 16944.85;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."€</label></center>";
			break;
			
			case "Dollar australien":
				$output = $digit * 26430.05;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."$</label></center>";
			break;
			
			case "Yen japonais":
				$output = $digit * 2385243.19;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."&#165;</label></center>";
			break;
		}
	}
}
?>





<?php
//dollar
if(ISSET($_POST['d_submit'])){
	$digit = $_POST['txt_digit'];
	$currency = $_POST['d_currency'];
	if($digit != ""){
		switch($currency){
			case "Euro":
				$output = $digit * 0.92;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."€</label></center>";
			break;
			
			case "Livre Sterling":
				$output = $digit * 0.82;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."£</label></center>";
			break;
			
			case "Bitcoin":
				$output = $digit * 0.000055;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."&#8383;</label></center>";
			break;
			
			case "Dollar australien":
				$output = $digit * 1.45;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."$</label></center>";
			break;
			
			case "Yen japonais":
				$output = $digit * 130.54;
				echo"<center><label class='text-success' style='font-size:25px;'>".$output."&#165;</label></center>";
			break;
		}
	}
}






$page_content = ob_get_clean();

?>


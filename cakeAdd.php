<?php
include_once 'init.php';

$cakeControler = new CakeControler();

$title = "Add a new cake";

if(isset($_GET["update"])){
	$cake = $cakeControler->GetCakeById($_GET["update"]);
	$content = 
			"<form action='' method='POST'>
				<fieldset>
					<legend>Add a new Cake</legend>
					<label for='type'>Type: </label>
					<select class='inputField' name='ddlType'>
						<option value='%'>All</option>"
						. $cakeControler->CreateOptionValues($cakeControler->GetCakeTypes()) .
					"</select><br/>
					
					<label for='name'>Name: </label>
					<input type='text' class='inputField' name='txtName' value='$cake->name' /><br/>
					
					<label for='price'>Price: </label>
					<input type='text' class='inputField' name='txtPrice' value='$cake->price' /><br/>
					
					<label for='img'>Image: </label>
					<select class='inputField' name='ddlImage' >"
					. $cakeControler->GetImages() .
					"</select><br/>
					
					<label for='text'>Text: </label>
					<textarea cols='70' rows='12' name='txtReview'>$cake->text</textarea><br/>
					
					<input type='submit' value='Submit'>
				</fieldset>
			</form>";
}else{
	$content = 
			"<form action='' method='POST'>
				<fieldset>
					<legend>Add a new Cake</legend>
					<label for='type'>Type: </label>
					<select class='inputField' name='ddlType'>
						<option value='%'>All</option>"
						. $cakeControler->CreateOptionValues($cakeControler->GetCakeTypes()) .
					"</select><br/>
					
					<label for='name'>Name: </label>
					<input type='text' class='inputField' name='txtName' /><br/>
					
					<label for='price'>Price: </label>
					<input type='text' class='inputField' name='txtPrice' /><br/>
					
					<label for='img'>Image: </label>
					<select class='inputField' name='ddlImage' >"
					. $cakeControler->GetImages() .
					"</select><br/>
					
					<label for='text'>Text: </label>
					<textarea cols='70' rows='12' name='txtReview'></textarea><br/>
					
					<input type='submit' value='Submit'>
				</fieldset>
			</form>";
}

if(isset($_GET['update'])){
	if(isset($_POST['txtName'])){
		$cakeControler->UpdateCake($_GET['update']);
	}
}else{
		if(isset($_POST["txtName"])){
			$cakeControler->InsertCake();
		}
}
include 'template.php';
?>


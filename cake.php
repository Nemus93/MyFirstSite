<?php
include "init.php";
$cakeControler = new CakeControler();

if(isset($_POST['types'])){
	//fill page with cakes of the selected type
	$cakeTables = $cakeControler->CreateCakeTables($_POST['types']);
}else{
	//page is loaded for the first time, no type selected -> fetch all types
	$cakeTables = $cakeControler->CreateCakeTables('%');
}

//output page data
$title = 'Cake overview';
$content = $cakeControler->CreateCakeDropdownList(). $cakeTables;

include 'template.php';

?>
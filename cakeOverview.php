<?php

include "init.php";
$cakeControler = new CakeControler();

$title = "Cake Overview";
$content = $cakeControler->CreateOverviewTable();

if(isset($_GET['delete'])){
	$cakeControler->DeleteCake($_GET['delete']);
	header("location:cakeOverview.php");
}

include "template.php";

?>
<?php 
	include ("smarty/libs/Smarty.class.php");
	require_once("losowanieSlowek.php");
	 $smarty = new Smarty();
	$losowanieSlowek=new losowanieSlowek();
	
	$smarty->assign("wylosowaneSlowka",$losowanieSlowek->wylosowaneSlowka);
	$smarty->display("index.html");
?>


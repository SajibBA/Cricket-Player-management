<?php

	include_once 'Crud.php';
	
	$crud = new Crud();
if (isset($_POST['player_id']))
{ 
	$id = $_POST['player_id'];

   $result = $crud->delete($id,"player");
	
	if($result){
			echo "success";
		}else{
			echo "problem";
		}

}


?>
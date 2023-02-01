/<?php
	include_once 'Crud.php';
	
	$crud = new Crud();
	
		$name = $_POST['p_name'];
	//	$player_id = $_POST['id'];
		$nation = $_POST['p_nation'];
		$img = $_POST['p_img'];
		$bat_hand = $_POST['p_bat_hand'];
		$ball_type = $_POST['p_ball_type'];
		$played_match = $_POST['p_played_match'];
		$runs = $_POST['p_runs'];
		$half_century = $_POST['p_half_century'];
		$century = $_POST['p_century'];
		$wickets = $_POST['p_wickets'];
		$fifer = $_POST['p_fifer'];
		
		$result = $crud->execute("INSERT into player(name,nation,img,bat_hand,ball_type,played_match,runs,half_century,century,wickets,fifer) VALUES('$name','$nation','$img','$bat_hand','$ball_type','$played_match','$runs','$half_century','$century','$wickets','$fifer')");
		
		if($result){
			echo "success";
		}else{
			echo "problem";
		}
		


	
		
	
?>
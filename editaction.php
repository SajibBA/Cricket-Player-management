<?php

	include_once 'Crud.php';
	
	$crud = new Crud();
	
	    
		$name = $_POST['p_name'];
		$player_id = $_POST['player_id'];
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
		
		echo $player_id;
		
		$result = $crud->execute("Update player SET name='$name',nation='$nation',img='$img',bat_hand='$bat_hand',ball_type='$ball_type',played_match='$played_match',runs='$runs',half_century='$half_century',century='$century',wickets='$wickets',fifer='$fifer' where player_id=$player_id");
		
		if($result){
			echo 'success';
		}else{
			echo "problem";
		}
		
	
	
	
?>
<?php

	include_once 'Crud.php';
	
	$crud = new Crud();
	$player_id = $_POST['player_id'];
	//echo $player_id ;
	$query = "select * from player where player_id=$player_id";
	
	$result = $crud->getData($query);
	
	foreach($result as $res){
		$player_id = $res['player_id'];
		$name = $res['name'];
		$nation = $res['nation'];
		$img = $res['img'];
		$bat_hand = $res['bat_hand'];
		$ball_type = $res['ball_type'];
		$played_match = $res['played_match'];
		$runs = $res['runs'];
		$half_century = $res['half_century'];
		$century = $res['century'];
		$wickets = $res['wickets'];
		$fifer = $res['fifer'];
	}
?>

		<h1> Editing Player </h1> <br>
			<img id="preview2" style="width:10%" src="<?php echo $img;?>" /></br>
			Player Image
			<input type="file" onchange="showMyImage2(this,'preview2')"  id="imgURL"/><br>
	<input type="text" id="uid" name="player_id" hidden value="<?php echo $player_id;?>"/>
<br> Name*	<input type="text" id="uname" name="name" value="<?php echo $name;?>"/>
<br> Nation*	<input type="text" id="unation" name="nation" value="<?php echo $nation;?>"/>
<br> Bating Hand	<input type="text" id="ubat_hand" name="bat_hand" value="<?php echo $bat_hand;?>"/>
<br> Ball Type	<input type="text" id="uball_type" name="ball_type" value="<?php echo $ball_type;?>"/>
<br> Played Match	<input type="number" id="uplayed_match" name="played_match" value="<?php echo $played_match;?>"/>
<br> Runs	<input type="number" id="uruns" name="runs" value="<?php echo $runs;?>"/>
<br> 50's	<input type="number" id="uhalf_century" name="half_century" value="<?php echo $half_century;?>"/>
<br> 100's	<input type="number" id="ucentury" name="century" value="<?php echo $century;?>"/>
<br> Wickets	<input type="number" id="uwickets" name="wickets" value="<?php echo $wickets;?>"/>
<br> Fifer	<input type="number" id="ufifer" name="fifer" value="<?php echo $fifer;?>"/>

	
	<input type="button" id="update" name="update" value="Update"/>
	<input type="button" onclick="$('#player-edit').hide();" name="cancel" value="Cancel"/>
<script type="text/javascript">

	function showMyImage2(fileInput,id) {
			
			console.log(fileInput);
			
			var files = fileInput.files;
			console.log(files);
			for (var i = 0; i < files.length; i++) {           
					var file = files[i];
					var imageType = /image.*/;     
					if (!file.type.match(imageType)) {
						continue;
					}           
					var img=document.getElementById(""+id);            
					img.file = file;    
					var reader = new FileReader();
					reader.onload = (function(aImg) { 
						return function(e) { 
							aImg.src = e.target.result; 
						}; 
					})(img);
					reader.readAsDataURL(file);
				}  
				
    }
	
	function showMyImage4(fileInput,id) {
			
			console.log(fileInput);
			
			var files = fileInput.files;
			console.log(files);
			for (var i = 0; i < files.length; i++) {           
					var file = files[i];
					var imageType = /image.*/;     
					if (!file.type.match(imageType)) {
						continue;
					}           
					var img=document.getElementById(""+id);            
					img.file = file;    
					var reader = new FileReader();
					reader.onload = (function(aImg) { 
						return function(e) { 
							aImg.src = e.target.result; 
						}; 
					})(img);
					reader.readAsDataURL(file);
				}  
				
    }








	$(document).ready(function(){
		
		$('#update').click(function(){
			     if (document.getElementById("uname").value != "" && document.getElementById("unation").value != "") {
				var player_id = $('#uid').val();
				var name = $('#uname').val();
				var nation = $('#unation').val();
				var bat_hand = $('#ubat_hand').val();
				var played_match = $('#uplayed_match').val();
				var runs = $('#uruns').val();
				var half_century = $('#uhalf_century').val();
				var century = $('#ucentury').val();
				var ball_type = $('#uball_type').val();
				var wickets = $('#uwickets').val();
				var fifer = $('#ufifer').val();
				var img = $('#preview2').attr('src');
				console.log(img);
		
			$.ajax({
				url:"editaction.php",
				type:"POST",
				data: {player_id:player_id,p_name : name,p_nation:nation,p_bat_hand:bat_hand,p_played_match:played_match,p_runs:runs,p_half_century:half_century,p_century:century,p_ball_type:ball_type,p_wickets:wickets,p_fifer:fifer,p_img:img },
				success: function(data){
					
					if(data == 'success'){
						$('#id').val('');
						$('#name').val('');
						$('#student_id').val('');
						$('#email').val('');
						$.get('view.php',function(data){
							$('#player-view').html(data);
						})
					
					}
						$.get('view.php',function(data){
							$('#player-view').slideDown();
							$('#player-edit').slideUp();							
							$('#player-view').html(data);
						})
				}
			})
						}
	else {
        alert("Please enter Name and Nation");
    }
	
		})
	
	})

</script>
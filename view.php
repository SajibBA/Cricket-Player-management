<?php

include_once 'Crud.php';

$crud = new Crud();

$query = "Select * from player order by player_id DESC";

$result = $crud->getData($query);

?>
<button id="Back">Back</button>
<!--<center> Welcome <?php //echo $_SESSION['name'];?>

</center>
<a href="logout.php">Log Out</a>-->
<table border="1">

	<tr>
		<td> Player ID </td>
		<td> Image </td>
		<td> Name </td>
		<td> Nation </td>
		<td> Batting Hand </td>
		<td> Balling type </td>
		<td> Palyed Match </td>
		<td> Runs </td>
		<td> Half Century </td>
		<td> Century </td>
		<td> Wickets </td>
		<td> Fifer </td>
		
	</tr>
	<?php
	 foreach((array) $result as $key=>$res){
		 echo "<tr>";		 
		 echo "<td>".$res['player_id']."</td>";	
		 echo "<td><img   width=30% height=50% display: block; src='".$res['img']."'/></td>";		 
		 echo "<td>".$res['name']."</td>";
		 echo "<td>".$res['nation']."</td>";
		 echo "<td>".$res['bat_hand']."</td>";
		 echo "<td>".$res['ball_type']."</td>";
		 echo "<td>".$res['played_match']."</td>";
		 echo "<td>".$res['runs']."</td>";
		 echo "<td>".$res['half_century']."</td>";
		 echo "<td>".$res['century']."</td>";
		 echo "<td>".$res['wickets']."</td>";
		 echo "<td>".$res['fifer']."</td>";
		 echo "<td><button player_id=".$res['player_id']." class='edit'>Edit</button> | 
		 <button player_id=".$res['player_id']." class='delete'>Delete</button></td>";
		 echo "</tr>";
	 }
	 ?>
</table>

<script type="text/javascript">
	$(document).ready(function(){
		$('#Back').click(function(){
			$('#player-view').slideUp();
			$('#home-page').slideDown();
		})
		
		$('.edit').click(function(){
			var player_id = $(this).attr('player_id');
			//alert(id);
			$.ajax({
				url:"edit.php",
				type:"POST",
				data: {player_id:player_id},
				success: function(data){
					$('#add-player').hide();
					$('#player-view').slideUp();
					$('#player-edit').show();
					$('#player-edit').html(data);
				}
			})
		})
		
		$('.delete').click(function(){
			var player_id = $(this).attr('player_id');
			//alert(player_id);
			$.ajax({
				url:"delete.php",
				type:"POST",
				data: {player_id:player_id},
				success: function(data){
					//$('#edit-form').show();
					//$('#edit-form').html(data);
					if(data == 'success'){
					$.get('view.php',function(data){
							$('#player-view').html(data);
						})
					}
					$.get('view.php',function(data){
							$('#player-view').html(data);
						})
					
				}
			})
		})
		
		
		
	})
</script>
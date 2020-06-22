<?php
function select_category(){
	global $connection;
	$query = "SELECT * FROM category";
		$all_category = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($all_category)){
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
			echo "<tr>";
			echo "<td>{$cat_id}</td> <td>{$cat_title}</td>";
			echo "</tr>";
		}
		
}

function insert_category(){
	global $connection;
	if(isset($_POST['submit'])){
		$cat_title = $_POST['cat_title'];
		
		if($cat_title == "" || empty($cat_title)){
			echo "This field should not be empty.";
		}
		else{
			$query = "INSERT INTO category(cat_title) VALUE('{$cat_title}')";
			
			$create_category_query = mysqli_query($connection, $query);
			if(!$create_category_query){
				die('QUERY FAILED' . mysqli_error($connection));
			}
		}
	}
}


function user_online(){
		
		global $connection;


			$session = session_id();
			$time = time();
			$time_out_in_second = 30;
			$time_out = $time - $time_out_in_second;
			
			$query = "SELECT * FROM user_online WHERE session = '$session'";
			$send_query = mysqli_query($connection, $query);
			$count = mysqli_num_rows($send_query);
			
			if($count == NULL){
				mysqli_query($connection, "INSERT INTO user_online (session, time) VALUES ('$session','$time')");
			} else {
				mysqli_query($connection, "UPDATE user_online SET time = '$time' WHERE session = '$session'");
			}
			
			$user_online_query = mysqli_query($connection, "SELECT * FROM user_online WHERE time > '$time_out'");
			return $user_online_query_count = mysqli_num_rows($user_online_query);

}

user_online();

function update_query(){
	global $connection;
	
}


?>
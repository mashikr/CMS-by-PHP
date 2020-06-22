<form action="" method="post">
<div class="form-group">
		<label for="cat_title">Edit Category</label>
		<?php
			if(isset($_GET['edit'])){
				$cat_id = $_GET['edit'];

				$query = "SELECT * FROM category WHERE cat_id = $cat_id";
				$select_catgory_id = mysqli_query($connection, $query);
				
				while($row = mysqli_fetch_assoc($select_catgory_id)){
					$cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];

			echo '<input value="';if(isset($cat_title)){echo $cat_title;} echo '" name="edit_cat_title" type="text" class="form-control">';
			
				}
			}
			
		?>
	<?php
	if(isset($_POST['edit_submit'])){
		$the_cat_title = $_POST['edit_cat_title'];
			$query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
			$update_query = mysqli_query($connection, $query);
			if(!$update_query){
				die("QUERY FAIlED" . mysqli_error($connection));
			}
		}
	?>

	</div>
	<div class="form-group">
		<input name="edit_submit" class="btn btn-primary mt-3" type="submit" value="Edit Category" />
	</div>
</form>
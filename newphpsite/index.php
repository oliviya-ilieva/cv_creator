<?php
     include('config/db_connect.php');

   


    
?>

<!DOCTYPE html>

<?php include('templates/header.php'); ?>
<section>
<h2 class="center grey-text">Search CV's</h2>
<p class="center">enter dates for which you want to see Cv</p>
<form class="white" action="details.php" method="POST">
        <input type="date" name="datePickerFrom" id="">
        <input type="date" name="datePickerTo" id="">
        <div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>


<?php include('templates/footer.php'); ?>

</html>

<?php 

include('config/db_connect.php');
 
 // check GET request id param 
 if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

//make sql 
$sql = "SELECT * FROM cvs WHERE id = $id";

// get the query result 
$result = mysqli_query($conn, $sql);

// fetch result in array format 
$cv = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);

 }

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container center grey-text">
     <?php if($cv): ?>

     <h4><?php echo htmlspecialchars($cv['firstname']); ?></h4>
     <p>Created by: <?php echo htmlspecialchars($cv['email']); ?></p>
     <h5>Competences:</h5>
     <p><?php echo htmlspecialchars($cv['competences']); ?></p>

     <?php else: ?>
        <h5>No such cv exists!</h5>
     <?php endif; ?>


</div>


<?php include('templates/footer.php'); ?>
</html>
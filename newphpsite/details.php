<?php

include('config/db_connect.php');

$datePickerFrom = $datePickerTo = '';

if(isset($_POST['submit'])){
    if(empty($_POST['datePickerFrom'])){
        //echo "Required <br />";
    } else {
        $datePickerFrom = $_POST['datePickerFrom'];
    //  echo ($_POST['datePickerFrom']);
    }
}


if(isset($_POST['submit'])){
   if(empty($_POST['datePickerTo'])){
       //echo "Required <br />";
   } else {
       $datePickerTo = $_POST['datePickerTo'];
    // echo ($_POST['datePickerTo']);
   }
}
$sql2 = "SELECT * FROM cvs WHERE birthdaydate >= '$datePickerFrom' AND birthdaydate <= '$datePickerTo';";
    // echo $sql2;
    $result = mysqli_query($conn, $sql2);
    $cvs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

<h4 class="center grey-text">CVs!</h4>
<p class="center">Hello, on this page you can see all created CV's by date you've chosen!</p>
<div class="container">

   

    <div class="row">
        <?php foreach ($cvs as $cv) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($cv['firstname']); ?></h6>
                        <ul>
                            <?php foreach (explode(',', $cv['competences']) as $competence) : ?>
                                <li><?php echo htmlspecialchars($competence); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="moreinformation.php?id=<?php echo $cv['id']?>" class="brand-text">More Info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>
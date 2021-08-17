<?php
    
    // add.php
    include('config/db_connect.php');

    $firstname = $surname = $lastname = $email = $datebirthday = $university = $competences = '';
    $errors = array('firstname' => '', 'surname' => '', 'lastname' => '', 'email' => '', 'datebirthday' => '', 'university' => '', 'competences' => '');

    if(isset($_POST['submit'])){
        
        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required';
        } else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        // check title
        if(empty($_POST['firstname'])){
            $errors['firstname'] = 'Firstname is required';
        } else{
            $firstname = $_POST['firstname'];
            echo var_dump($firstname);
            //if(false){
            if(!preg_match("/^[\p{L}]+$/u", $firstname)){
                $errors['firstname'] = 'Firstname must be letters and spaces only';
            }
        }

        if(empty($_POST['surname'])){
            $errors['surname'] = 'Surname is required';
        } else{
            $surname = $_POST['surname'];
            if(!preg_match("/^[\p{L}]+$/u", $surname)){
                $errors['surname'] = 'Surname must be letters and spaces only';
            }
        }
        if(empty($_POST['lastname'])){
            $errors['lastname'] = 'Lastname is required';
        } else{
            $lastname = $_POST['lastname'];
            if(!preg_match("/^[\p{L}]+$/u", $lastname)){
                $errors['lastname'] = 'Lastname must be letters and spaces only';
            }
        }

        if(empty($_POST['university'])){
            $errors['university'] = 'University is required';
        } else{
            $university = $_POST['university'];
            if(!preg_match("/^[\p{L}\s]+$/u", $university)){
                $errors['university'] = 'University name must be letters and spaces only';
            }
        }

        if(empty($_POST['datebirthday'])){
            $errors['datebirthday'] = 'Birthday date is required';
        } else{
            $datebirthday = $_POST['datebirthday'];
            echo $datebirthday;
            if(!preg_match('/^[0-9\/-]+$/m', $datebirthday)){
                $errors['datebirthday'] = 'The date is not correct!';
            }
        }

        // check competences
        if(empty($_POST['competences'])){
            $errors['competences'] = 'At least one competence is required';
        } else{
            $competences = $_POST['competences'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $competences)){
                $errors['competences'] = 'Competences must be a comma separated list';
            }
        }

        if(array_filter($errors)){
            //echo 'errors in form';
        } else {
            // escape sql chars
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $birthdaydate = mysqli_real_escape_string($conn, $_POST['datebirthday']);
            $university = mysqli_real_escape_string($conn, $_POST['university']);
            $competences = mysqli_real_escape_string($conn, $_POST['competences']);

            // create sql
            $sql = "INSERT INTO cvs(firstname, surname, lastname,email,birthdaydate,university,competences) 
            VALUES('$firstname', '$surname', '$lastname', '$email','$birthdaydate', '$university', '$competences')";

            // save to db and check
            if(mysqli_query($conn, $sql)){
                // success
                header('Location: index.php');
            } else {
                echo 'query error: '. mysqli_error($conn);
            }
            
        }

    } // end POST check

?>

<!DOCTYPE html>
<html>
    
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Create New CV!</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Firstname</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname) ?>">
            <div class="red-text"><?php echo $errors['firstname']; ?></div>
            <label>Surname</label>
            <input type="text" name="surname" value="<?php echo htmlspecialchars($surname) ?>">
            <div class="red-text"><?php echo $errors['surname']; ?></div>
            <label>Lastname</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars($lastname) ?>">
            <div class="red-text"><?php echo $errors['lastname']; ?></div>
            <label>Date birthday</label>
            <input type="date" name="datebirthday" value="<?php echo htmlspecialchars($datebirthday) ?>">
            <div class="red-text"><?php echo $errors['datebirthday']; ?></div>
            <label>University</label>
            <input type="text" name="university" value="<?php echo htmlspecialchars($university) ?>">
            <div class="red-text"><?php echo $errors['university']; ?></div>
            <label>Competences (comma separated)</label>
            <input type="text" name="competences" value="<?php echo htmlspecialchars($competences) ?>">
            <div class="red-text"><?php echo $errors['competences']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>

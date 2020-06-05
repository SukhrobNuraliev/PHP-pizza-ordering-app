<?php

include('config/db_connect.php');


$title = $email = $ingredients  = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    // checking

    if (empty($_POST['email'])) {
        $errors['email'] = "An email is required <br />";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be a valid email address';
        }
    };
    if (empty($_POST['title'])) {
        $errors['email'] = 'A title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
    };
    if (empty($_POST['ingredients'])) {
        $errors['email'] = 'At least one ingredient is required <br />';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            echo 'Ingredients must be a comma separated list';
        }
    };


    if (array_filter($errors)) {
        // echo 'errors in the form';
    } else {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // create sql
        $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title','$email','$ingredients')";

        // save to dn and check
        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        };
    }


    // end of POST check
}

?>



<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php' ?>
<div style="margin-top: 1rem;" class='container text-left'> <a href="index.php" class=" btn btn-dark"> Back </a> </div>
<div class="text-secondary add-pizza text-center">
    <h3>Add a Pizza</h3>
</div>
<form class="container my-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email) ?>">
    </div>
    <div class="text-danger">
        <?php echo $errors['email']; ?>
    </div>
    <div class="form-group">
        <label>Pizza Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($title) ?>">
    </div>
    <div class="text-danger">
        <?php echo $errors['title']; ?>
    </div>
    <div class="form-group">
        <label>Ingredients (comma separated)</label>
        <input type="text" name="ingredients" class="form-control" value="<?php echo htmlspecialchars($ingredients) ?>">
    </div>
    <div class="text-danger">
        <?php echo $errors['ingredients']; ?>
    </div>

    <div class="text-center">
        <button type="submit" value="submit" name="submit" class="btn btn-warning ">Submit</button>
    </div>
</form>

<?php include 'templates/footer.php' ?>

</html>
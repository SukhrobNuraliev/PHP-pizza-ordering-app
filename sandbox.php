<?php

session_start();

if (isset($_POST['submit'])) {


    //cookies 
    setcookie('gender', $_POST['gender'], time() + 89900);


    session_start();

    $_SESSION['name'] = $_POST['name'];

    header('Location: index.php');
}


?>
<html>

<head>

</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="name">
        <input type="submit" name="submit" value="submit">
        <select name="gender">
            <option value="male">male</option>
            <option value="female">femali</option>


        </select>
    </form>

</body>

</html>
<?php
session_start();

$name = $_SESSION['name'] ?? 'Mehmon';


//get cookie
$gender = $_COOKIE['gender'] ?? 'Unknown';


?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .brand {
            background: orange;
            padding: 0.3rem 1rem !important;
            border-radius: 3px;
        }

        .brand-text {
            color: orange !important;
        }

        .my-form {
            background: #DCDCDC;
            margin-top: 2rem;
            padding: 1rem 2rem;
            width: 50%;
            border-radius: 5px;

        }

        .add-pizza {
            margin-top: 2rem;
        }

        .card,
        .btn {
            margin-bottom: 0.6rem;
        }

        .details {
            background: lightgrey;
            padding: 2rem 2rem !important;
            text-align: center;
            margin-top: 5rem;
            border-radius: 5px;
            /* flex-direction: column;
            justify-content: center;
            align-items: center; */
            transition: all 0.5s ease;
        }

        .details:hover {
            cursor: pointer;
            -webkit-box-shadow: 0px 0px 23px 1px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 0px 23px 1px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 0px 23px 1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="grey">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand brand-text" href="index.php">Navbar</a>
        </div>
        <ul class="navbar-nav right">
            <li class=" text-danger">
                Salam <?php echo htmlspecialchars($name); ?>
            </li>
            <li class=" text-danger">(<?php echo htmlspecialchars($gender) ?>)</li>
            <li class="nav-item active">
                <a class="right nav-link brand" href="add.php">Add a Pizza</a>
            </li>
        </ul>
    </nav>
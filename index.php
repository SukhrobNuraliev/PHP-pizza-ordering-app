<?php

include('config/db_connect.php');


// 1) write query for all pizzas

$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// 2) make query & get result

$result = mysqli_query($conn, $sql);

// 3) fetch the resulting rows as an array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//good practices
//freeign result from memory
mysqli_free_result($result);
//close connection
mysqli_close($conn);
//------


?>



<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php' ?>

<h2 class=" text-center text-danger" style="margin: 2rem 0;">Pizzas!!</h2>

<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza) : ?>

            <div class=" col-12 col-sm-6 col-lg-4">
                <div class="card border-light text-center text-white bg-danger">
                    <img class="card-img-top" src="./img/pizza.jpg">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($pizza['title']); ?></h3>
                        <!-- <h6 class="card-subtitle"><?php echo htmlspecialchars($pizza['created_at']); ?></h6> -->
                        <ul class="list-group list-group-flush">
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>

                                <li style="background: #d9534f;" class="list-group-item"><?php echo htmlspecialchars($ing) ?></li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class=" container ">
                        <a href="details.php?id=<?php echo $pizza['id'] ?>" class="btn btn-dark">More Info</a>
                    </div>
                    <!-- <div class="card-footer"> $9.99 </div> -->

                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>


<?php include 'templates/footer.php' ?>

</html>
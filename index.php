<?php

    include "logic.php";

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Blog using PHP & MySQL</title>
</head>
<body class = "bg-dark">

    <div class="container mt-5">

        <?php 
            if (isset($_GET['delete_id'])){
                    $delete_id = $_GET['delete_id'];
                    $sql = "DELETE FROM my_blog_data WHERE id=" .$delete_id ;
        
                    if(mysqli_query($con, $sql)){
                        header("Location: index.php");
        
                    }else {
                        echo "post not deleted".mysqli_error($con);
                    }
            }
        ?>
        

        <!-- Create a new Post button -->
        <div class="text-center">
            <a href="create.php" class="btn btn-outline-light">+ Create a new post</a>
        </div>
        
        <!-- posts -->
        <div>
            <?php
                $sql = "SELECT * from my_blog_data LIMIT 21";

                $result = mysqli_query($con, $sql);

                if(mysqli_num_rows($result)> 0){
                    echo    ' <div class="container mt-5 text-center">';
                    echo '<div class="row row-cols-4">';
                    while( $row = mysqli_fetch_assoc($result)){
                        echo '
                        
                            <div class="col">
                              <div class="card-body border border-light enable-rounded" style="margin-bottom: 10px; border-radius: 20px">
                                <h5 class="card-title text-light">'.$row["title"].'</h5>
                                <a href="view.php?id='.$row["id"].'" class="btn btn-dark border border-light">View More</a>
                                <a name = "delete_id" href="index.php?delete_id='.$row["id"].'" class="btn btn-danger border border-light">Delete</a>
                            </div>
                        </div>
                              ';
                    }
                    echo '</div>';
                    echo '</div>';
                }else{
                    echo "<container class = ' container mt5 text-center '><h1 class = ' text-light '>No Blogs Stored</h1></container >";
                }
            ?>
        </div>
        
       
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>



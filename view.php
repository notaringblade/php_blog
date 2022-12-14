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

   <div class="container mt-5 ">

        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM my_blog_data WHERE id = ".$id; 

                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="card bg-dark text-white border border-light overflow-auto" style=" max-height: 800px; border-radius: 20px; >
                        <div class="card-body">
                            <h5 class="card-title text-center fixed: top " style= "max-height 75; margin-top: 10px">'.$row["title"].'</h5>
                            <p> '.$row["content"].' </p>
                            </div>
                        </div>';
                    }

                }else{
                    echo '<div> Error </div>';
                }
                

            }else{
                header("Location: index.php");
            }
        ?>  

        <a href="index.php" class="btn btn-outline-light my-3">Go Home</a>

        
   </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
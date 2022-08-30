<?php

    include "logic.php";

    if(isset($_POST['submit'])){
        if(isset($_POST['title']) && !empty($_POST['title'])){
            $title = $_POST['title'];
        }else{
            $titleError = '<div> error </div>';
        }
        if(isset($_POST['content']) && !empty($_POST['content'])){
            $content = $_POST['content'];
        }else{
            $contentError = '<div> error </div>';
        }

        if (isset($_POST['title']) && !empty($_POST['title'])  &&  isset($_POST['content']) && !empty($_POST['content'])){
            $sql = "INSERT INTO my_blog_data(title, content) VALUES('$title', '$content' )";

            if(mysqli_query($con, $sql)){
                header("location: index.php");
            }else{
                $sqlError = '<div> class="alert alert-danger" role="alert" <Strong> Error  </Strong> Try Again </div>' .mysqli_error($con);
            }

        }
    }



    // if(isset($_POST['submit'])){
    //     $title = $_POST['title'];
    //     $long_desc = $_POST['content'];

    //     if($title != ''){
    //         mysqli_query($con, "INSERT INTO blog_data   (title,long_desc) VALUES('".$title."','".$long_desc."') ");
    //         header('location: index.php');
    //     }
    // }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- include tinymce -->
    <script src="https://cdn.tiny.cloud/1/i034n79yx41d5cddgnxl9siuclv6guu35dbpil2pfqam8s4c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</script>


    <title>Blog using PHP & MySQL</title>
</head>
<body class = 'bg-dark'>

   <div class="container mt-5 ">
        <form method="post" target="">

            <input type="text" placeholder="Blog Title" class="form-control my-3   text-black text-center" style = 'width: 1200px' name="title" value='<?php if(isset($title)) echo $title; ?>'>
            
            <textarea id="content" name="content" class="form-control dark"value="<?php if(isset($content)) echo $content; ?>"></textarea>


            <button class="btn btn-dark border border-light" style = ' margin-top: 10px ' name="submit">Add Post</button>
            <a href="index.php" class="btn btn-dark border-light">Go Home</a>

        </form>
   </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

     <!-- Script -->
     <script>
        tinymce.init({
            selector: '#content',
            // skin: 'oxide-dark',
            // content_css: 'dark',
            menubar: false,
            toolbar: false,
            statusbar: false,
            icons: "thin",
            
            placeholder: "Tell your story...",
            min_height: 600,
            max_height: 800,
            width: 1200,
            content_style:
            "@import url('https://fonts.googleapis.com/css2?family=Tinos&display=swap'); body { font-family: 'Tinos', serif; font-size: 16pt; color: 'white'; }",
            quickbars_selection_toolbar: "bold italic link  | h1 h2 | blockquote",
            quickbars_insert_toolbar: "image media code bold",
            plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount', 'code', "autoresize quickbars image media table hr",
            ],
            // toolbar: 'undo redo | formatpainter casechange styleselect | bold italic backcolor |'
        });
    </script>
    
</body>
</html>
<?php
$connection = mysqli_connect('localhost','root','','codino');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    For getting a favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="images/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <title>Question | <?php echo $_GET['id'];  ?></title>
</head>
    <?php
    if(isset($_GET['id'])){
    $the_id = $_GET['id'];
    $query = "SELECT * FROM code WHERE id = $the_id ";
    $select_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_query)){
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $question = $row['question'];
        $diff = $row['diff'];
        $category = $row['category'];
        $link = $row['link'];
    ?>
    <body class="alert <?php 
                    if($diff == "Easy")
                        echo "alert-success";
                    else if($diff == "Moderate")
                        echo "alert-warning";
                    else if($diff == "Hard")
                        echo "alert-danger";
             ?> ">
    <h1 class="display-4"> <div class="container" style="font-family: 'Satisfy', cursive; text-decoration:underline;"><?php echo $title; ?> </div></h1>            
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12">
            <?php  echo $question;?>
            <a href="<?php echo $link;  ?>" class="btn <?php
                    if($diff == "Easy")
                        echo "btn-success";
                    else if($diff == "Moderate")
                        echo "btn-warning";
                    else if($diff == "Hard")
                        echo "btn-danger";
            ?>">Get the question!</a>
            <a href="answer.php?id=<?php echo $the_id; ?>" class="btn <?php
                    if($diff == "Easy")
                        echo "btn-success";
                    else if($diff == "Moderate")
                        echo "btn-warning";
                    else if($diff == "Hard")
                        echo "btn-danger";
            ?>">Get the answer!</a>
            </div>
        <?php  } }?>
            <div class="col-md-3 col-xs-12">
            <div class="row">
                <div class="col-6 text-muted">Difficulty</div>
                <div class="col-6"> <?php echo $diff; ?></div>
                <div class="col-6 text-muted">Category</div>
                <div class="col-6"> <?php echo $category; ?></div>
            </div>
            </div>
        </div>
        
    </div>
    
                <br>        
                <!-- Blog Comments -->
                
                <?php
                if(isset($_POST['create_comment'])){
                    $the_id = $_GET['id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                    
                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
                        
                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_date) ";
                    $query .= "VALUES ($the_id, '$comment_author', '$comment_email', '$comment_content', now()) ";
                    
                    $create_comment_query = mysqli_query($connection, $query);
                    
                    if(!$create_comment_query){
                        die('QUERY FAILED '.mysqli_error($connection));
                    }
                        
                    }else{
                        
                        echo "<script> alert('Fields cannot be empty') </script>";
                        
                    }
            
                }
                
                
                ?>
                

                <!-- Comments Form -->
                <div class="well">
                <div class="container">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                    <div class="form-row">        
                        <div class="form-group col-md-6 col-xs-12">
                           <label for="author">Your Name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>              
                       <div class="form-group col-md-6 col-xs-12">
                           <label for="email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>     
                        <div class="form-group col-12">
                          <label for="comment">Your comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </div>
                    </form>
                </div>
            </div>

                <hr>
                <div class="container">
                <!-- Posted Comments -->
                <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_id} ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection, $query);
                if(!$select_comment_query){
                    die('Query Failed ' . mysqli_error($connection));
                }
                while($row = mysqli_fetch_array($select_comment_query)){
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];
                    ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <div style="width:64px;height:64px;background:#002255;border-radius:50%; text-align:center;font-size:2rem;padding-top:10%;"><?php
                        $comment_fletter = substr($row['comment_author'],0,1);
                        echo strtoupper($comment_fletter);
                        ?>
                    </div>
                    </a>
                    <div class="media-body" style="padding-left:10px;">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small> <?php echo $comment_date;  ?></small>
                        </h4>
                        <?php echo $comment_content;  ?>
                    </div>
                </div>
                <br>
                
                <?php } ?>
                </div>
    

</body>
</html>
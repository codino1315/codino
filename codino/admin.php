<?php
$connection = mysqli_connect('localhost','root','','codino');

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $question = $_POST['question'];
    $diff = $_POST['diff'];
    $category = $_POST['category'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $link = $_POST['link'];
    
    $question = mysqli_real_escape_string($connection, $question);
    $ans1 = mysqli_real_escape_string($connection, $ans1);
    $ans2 = mysqli_real_escape_string($connection, $ans2);
    $link = mysqli_real_escape_string($connection, $link);
    
    $query = "INSERT INTO code (title, description, question, diff, category, ans1, ans2, link, date) VALUES ('$title','$description','$question','$diff','$category','$ans1','$ans2','$link', now())";
    
    $insert_data = mysqli_query($connection, $query);
    
    if(!$insert_data){
        die("EROOOROR" . mysqli_error($connection));
    }
}


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
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    
    <title>Admin Panel</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Description</label> 
            <input type="text" class="form-control" placeholder="Description" name="description">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Question</label>
            <textarea class="form-control" id="body" rows="3" name="question"></textarea>
          </div>
          <div class="form-group">
              <label for="diff">Difficulty Level</label>
              <input type="text" class="form-control" placeholder="Difficulty" name="diff">
          </div>
          <div class="form-group">
              <label for="category">Category</label>
              <input type="text" class="form-control" placeholder="Category" name="category">
          </div>
          <div class="form-group">
            <label for="ans1">Answer 1</label>
            <textarea class="form-control" id="body1" rows="3" name="ans1"></textarea>
          </div>
          <div class="form-group">
            <label for="ans2">Answer 2</label>
            <textarea class="form-control" id="body2" rows="3" name="ans2"></textarea>
          </div>
         <div class="form-group">
              <label for="link">Link</label>
              <input type="text" class="form-control" placeholder="Link" name="link">
          </div>     
          <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit">
          </div>
        </form>
        
    </div>

</body>
<script src="js/script.js"></script>
<script src="js/script1.js"></script>
<script src="js/script2.js"></script>
</html>
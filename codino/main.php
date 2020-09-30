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
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">

    <title>Main Page</title>
</head>
<body style="background:#24292e;">
        <div class="container">
        <div class="jumbotron" style="background:#24292e;">
        <!--        #A4B0BD-->
         <div class="container" style="text-align:center;">
          <h1 class="display-4" style="color:lightcoral;font-family: 'Dancing Script', cursive;"> Start Coding Today with codino ! </h1>
          <p class="lead" style="color:lightgreen;font-family: 'Courgette', cursive;">You are never too late to start anything, this moment is the best time to start.</p>          
            </div>
        </div>

       <div class="row">
                  <?php                        
                    $query = "SELECT * FROM code";
                    $select_query = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $question = $row['question'];
                        $diff = $row['diff'];
                        $category = $row['category'];
                        $date = $row['date'];
                    ?>
                <div class="col-lg-4 col-sm-6">
               <a href="question.php?id=<?php echo $id;?>">
                <div style="padding-left: 5%; padding-top:5%;" class=" alert 
                   <?php
                    if($diff == "Easy")
                        echo "alert-success";
                    else if($diff == "Moderate")
                        echo "alert-warning";
                    else if($diff == "Hard")
                        echo "alert-danger";
                    ?>
                   ">
                    <i class="fas fa-bookmark fa-1x"> <span class="lead"> &nbsp; <?php echo $title;  ?> </span> 
                       
                        <?php if($date === date("Y-m-d")){  ?>
                         <span class="badge badge-primary">New</span> 
                         <?php } ?>
                         
                         </i> <br> <br>
                    <p class="small" style="font-family: 'Monda', sans-serif;"> <?php echo $description; ?> </p>
                    <i class="fas fa-circle"><span class="small"> &nbsp; <?php echo $category;  ?> </span></i> 
                </div>
                </a>       
           </div>
           <?php } ?>    
        
       </div>            
   </div>
    <footer>
        <br>
        <p style="color:lightcoral; text-align:center;">In case of any issues or suggestions, feel free to write us to <a href="mailto:codino1315@gmail.com" style="color:lightgreen;"> codino1315@gmail.com </a></p>
    </footer>
</body>
</html>
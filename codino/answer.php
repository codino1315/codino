<?php
$connection = mysqli_connect('localhost','root','','codino');
?>
<!DOCTYPE html>
<html>
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
	<style>
        
		#c:hover{
			color: #24292e;
			cursor: pointer;
		}
		#java:hover{
			color: orange;
			cursor: pointer;
		}

	</style>
	<title>Answer | <?php echo $_GET['id'];  ?></title>
</head>
<body style="overflow-x: hidden;">
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
        $ans1 = $row['ans1'];
        $ans2 = $row['ans2'];
?>
	<div class="row" style="width:100vw;height:100vh;">
		<div class="col-md-6 col-xs-12" style="background: orange;">
			<p class="text-center" id="c" style="color:#24292e;font-weight: bold;font-size:4.5rem; margin-top:45vh;">C++</p>
			<div class="container">
            <div class="container">
            <div id="c1" style="color:black; display:none;">
            <?php  echo $ans1;  ?>
		    </div>
            </div>
            </div>	
		</div>	
		<div class="col-md-6 col-xs-12" style="background: #24292e;">
			<p class="text-center" style="color:orange; margin-top: 45vh; font-weight: bold; font-size: 4.5rem;" id="java">JAVA</p>
            <div class="container">
            <div class="container">
			<div id="java1" style="color:orange;display:none;">
			 <?php  echo $ans2;  ?>
            </div>
            </div>
		</div>	
		</div>	
	</div>
<?php  }} ?>
</body>

<script>

	document.getElementById("java").addEventListener("click",function(){
		document.getElementById("java").style.display="none";
		document.getElementById("java1").style.display="block";

	})

	document.getElementById("c").addEventListener("click",function(){
		document.getElementById("c").style.display="none";
		document.getElementById("c1").style.display="block";

	})



</script>
</html>
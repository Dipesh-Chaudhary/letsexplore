<!DOCTYPE html>
<html>

<head>
	<title>Add Places</title>
    <style>

        body {
        color:white;
        background-color: rgb(191, 165, 212);
        text-align: center;
        }
        input,textarea{
        background-color:lightblue;
        text-decoration:bold;
        margin-left:5px;
        margin-right:5px;
        }
        input:hover,textarea:hover{
        background-color:white;
        }
        input.btn{
            color:blue;
            border-radius:40px;      
            box-shadow: 4px 1px rgb(0, 195, 216);
        }
        a{
            text-decoration: none;
            
            color:blue;
        }
        div.content{
            border-radius:40px;      
            box-shadow: 10px 10px rgba(142, 195, 216,0.3);
            background-color:rgba(0,0,40,0.5);
            margin-bottom:15%;
            margin-right:20%;
            margin-left:20%;
        
            }
        .back-vid video{
            position: fixed;
            top:0; left: 0;
            z-index: -1;
            height: 100%;
            width:100%;
            object-fit:cover;
            opacity:0.9;
        }

    
</style>
</head>

<body style="text-align:center">
<div class="back-vid">
  <video src="vid-1.mp4" loop autoplay muted></video>
    <div class="content">
	<form  action="index.php" method="POST" enctype="multipart/form-data">
        
		<h1>Add Travel Places</h1>
        <b>Select Category type</b><br>
        <input type="radio" name="category" value="Religious" >Religious
        <input type="radio" name="category" value="CLIMBING">CLIMBING
        <input type="radio" name="category" value="TREKKING">TREKKING
        <input type="radio" name="category" value="ADVENTURE">ADVENTURE 
        <input type="radio" name="category" value="PEACEFUL">PEACEFUL
        <input type="radio" name="category" value="TRENDING">TRENDING<br>
        <input type="radio" name="category" value="DESRT SAFARI">DESRT_SAFARI
        <br><br><br>
		<b>Enter destination name</b><br>
        <input type="text" name="Destination" required ><br><br><br>
        <b><label for="front_name">Upload Front photo of destination</label></b><br>
        
		<input type="file" name="front_name" accept="image/*" required><br><br>
        
        <b>Enter blogs<b><br>
        <textarea name="blogs" ></textarea><br><br><br>
		<input type="submit" name="submit" class="btn" value="UPLOAD">

	</form>
    </div>

<?php
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $conn = mysqli_connect('localhost','root','','practise');
    $category=$_POST['category'];
   
    $Destination=$_POST['Destination'];
     $front_name = $_FILES['front_name']['name'];
    $blogs=$_POST['blogs'];
   
    $upload_dir = "uploads/";
    $path = $upload_dir.$front_name;
    $query = "INSERT INTO categories_tbl VALUES ('$category','$Destination','$front_name','$blogs')";
    $run= mysqli_query($conn,$query);

    if($run){
         
        move_uploaded_file($_FILES["front_name"]["tmp_name"], $path);
        
    ?><b style="color:red;"><?php echo "Data inserted successfully"; ?> </b>
    <?php
     
    

}  
   
}
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</div>
</body>
</html>
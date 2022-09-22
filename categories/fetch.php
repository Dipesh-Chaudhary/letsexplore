 <!DOCTYPE html>
<html lang="en">

<head>
<title>LISTS OF PLACES </title>
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
body {
  background-color: linen;
  text-align: center;
  z-index:-1;
}
blink {
  animation: 3s linear infinite condemned_blink_effect;
}

@keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
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

h1.tittle{
    
    top:1%;
    align:center;
    
    color:white;
    background-color:rgba(0,0,0,0.5);
  
    padding:8px;
  
}
img{
    border-radius:20px;
    box-shadow: 10px 10px lightblue;
    height:30%;
    width:35%;
    opacity:0.95;
    z-index:-2;
}
button{
background-color: orange;
border-radius:20px;
padding:4px;
text-decoration: none;
opacity:0.95;
}
img:hover,button:active{
    background-color: white;
    opacity:1;
    width:40%;
    height:70%;
    z-index=1000;

}


</style>
</head>

<body>
<div class="back-vid">
    <video src="vid-1.mp4" id="video-slider" loop autoplay muted></video>
    <?php
$conn = mysqli_connect('localhost','root','','practise');
if(isset($_POST['RELIGIOUS'])) {
    $query ="select * from categories_tbl where Category_type	=\"RELIGIOUS\"";
    echo "<h1 class=\"tittle\"> RELIGIOUS</h1>";
}
else if(isset($_POST['CLIMBING'])) {
    $query ="select * from categories_tbl where Category_type	=\"CLIMBING\"";
    echo "<h1 class=\"tittle\"> CLIMBING</h1>";
}
else if(isset($_POST['TREKKING'])) {
    $query ="select * from categories_tbl where Category_type	=\"TREKKING\"";
    echo "<h1 class=\"tittle\">TREKKING</h1>";

}
else if(isset($_POST['ADVENTURE'])) {
    $query ="select * from categories_tbl where Category_type	=\"ADVENTURE\"";
    echo "<h1 class=\"tittle\"> ADVENTURE</h1>";
}
else if(isset($_POST['PEACEFUL'])) {
    $query ="select * from categories_tbl where Category_type	=\"PEACEFUL\"";
    echo "<h1 class=\"tittle\"> PEACEFUL</h1>";
}
else if(isset($_POST['TRENDING'])) {
    $query ="select * from categories_tbl where Category_type	=\"TRENDING\"";
    echo "<h1 class=\"tittle\"> TRENDING</h1>";
}
else if(isset($_POST['DESERT_SAFARI'])) {
    $query ="select * from categories_tbl where Category_type	=\"DESERT_SAFARI\"";
    echo "<h1 class=\"tittle\"> DESERT SAFARI</h1>";
}
elseif(isset($_POST['qsearch'])){
    $search_key=$_POST['Destination'];
 $query="select * from categories_tbl where Destination	REGEXP '".$search_key."+'";
 echo "<h1 class=\"tittle\"> Search results similar to your search key</h1>";
}
else {
    echo "Choose a category";
    header('Location: http://localhost/tour and travel website/index.html');
}

    $run = mysqli_query($conn,$query);
    if (mysqli_num_rows($run) > 0){
        echo "<form  action=\"http://localhost/tour and travel website/TravelAgencylist.fetch.php\" method=\"POST\" enctype=\"multipart/form-data\">";
            $Destination="";
        while($row = mysqli_fetch_array($run)) {
           
            echo "<div><img src=\"uploads/$row[Front_photo_name]\"  height='40%' width='40%' frameborder='0' alt=\"Unable to see photo\" ></div>";
           
            $Destination=$row["Destination"];
            echo "<b><h1 style=\"color:brown\">".$Destination."</h1></b>";
            
            
            echo "<i><h4 style=\"color:white\"> ".$row["Blogs"]."</h3></i>";
            echo"<blink><i style=\"color:yellow\">Want to explore the place ? click on the link to see lists of travel agents ↓↓</i></blink><br>";
            echo "<button type=\"submit\" name=\"Destination\" value =\"$Destination \" class=\"btn\" formaction=\"http://localhost/tour and travel website/TravelAgencylist/fetch.php\" >Click me</button>";
            echo"<br>";
            echo"<br>";
            echo"<br>";
            echo"<br><div style=\"width:100%;height:2px;background-color:antiquewhite;\"></div>";
            echo"<input type=\"radio\" style =\"display :none\" name=\"SORT_BY\" value=\"1\" checked><br>";

           }
       echo "</form>";
       }
       
      
      else {
       echo "<h3 style=\"color:red\"><i>No resul found</i></h3> <br>";
   }
   echo "<a href=\" http://localhost/tour and travel website/index.html\" style =\"background-color: orange;border-radius:20px;padding:4px;text-decoration: none\"> GO BACK</a>";

   mysqli_close($conn);
   ?>
</div>
</body>
</html>
 
 

 
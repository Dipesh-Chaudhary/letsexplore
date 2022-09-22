
<!DOCTYPE html>
<html lang="en">

<head>
    
<style>
body {
  background-color: linen;
  text-align: center;
}
blink {
  animation: 2s linear infinite condemned_blink_effect;
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
div.sort{
   
   
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
a:hover{
            text-decoration: underline;
            color:red;
        }
h1{
  color: maroon;
 
}
img{
    border-radius:40px;
    box-shadow: 10px 10px lightblue;
    margin-right:10%;
    margin-left:10%;
    height:30%;
    width:35%;
    opacity:0.95;
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
    width:40%;
    height:70%;
    z-index=1000;

}


</style>
    <title>TRAVEL AGENTS LISTS </title>
</head>

<body class="center">
<div class="back-vid">
    <video src="vid-1.mp4" id="video-slider" loop autoplay muted></video>
<form action="#" method="post">
    <div class ="sort">
    <label for="SORT_BY"><h2>SORT BY</h2></label><br>
<select name="SORT_BY" id="SORT_BY">
<option value="1" >RATINGS</option>
<option value="2">LOWEST PRICE</option>
<option value="3" >HIGHEST PRICE</option>

</select><br>
<input type="radio" style ="display :none" name="Destination" value="<?php echo $_POST['Destination']?>" checked><br>
<button id="submit">Get the Selected Value</button><br><br>
    </div>
    <?php
    
$Destination =$_POST['Destination'] ;
$conn = mysqli_connect('localhost','root','','practise');
$query ="select * from travel_agency_tbl  where Destination = \"$Destination\" order by Rating desc";

$choose = $_POST['SORT_BY'];

if($choose==1){
    $query ="select * from travel_agency_tbl  where Destination=\"$Destination\" order by Rating desc"; 
    echo"<h1>Lists sorted by Ratings </h1><br><br><br>";
}
elseif($choose==2){
     $query ="select * from travel_agency_tbl   where Destination=\"$Destination\" order by Rates asc"; 
     echo"<h1>Lists sorted by lower rates </h1><br><br><br>";
}
elseif($choose==3){
     $query = "select * from travel_agency_tbl   where Destination=\"$Destination\" order by Rates desc";  
     echo"<h1>Lists sorted by Higher rates </h1><br><br><br>";
    }
    $run = mysqli_query($conn,$query);
    if (mysqli_num_rows($run) > 0){
        while($row = mysqli_fetch_array($run)) {
           
         
            echo "<img src=\"uploads/$row[Logo_name]\"   frameborder='0' alt=\"Unable to see photo\">";
            echo"<br>";
            echo "<h2 style=\"color:white;\">RATING :-  ".$row["Rating"]."</h2>";
           
            echo"<h2 style=\"color:white;\">RATES :-  ".$row["Rates"]."</h2> ";
            
            echo"<blink><h3 style=\"color:red;\">↓↓Click on the link to visit their website↓↓</h3></blink>";
            echo "   <a style =\"background-color: orange;text-decoration: none;border-radius:20px; padding:4px;\" href=\"https://$row[Link]\">".$row["Name"]."</a>";
            echo"<br>";
            echo"<br>";
            echo"<br><div style=\"width:100%;height:2px;background-color:antiquewhite;\"></div>";
            echo"<br>";
           
           }

       }
       
      
      else {
       echo "<h5 style=\"color:red\">No travel agents found for this destination</h5>";
      

   }
   echo "<a href=\" http://localhost/tour and travel website/index.html\" style =\"background-color: orange;border-radius:20px;padding:4px;text-decoration: none\"> HOME</a>";

   mysqli_close($conn);
   ?>
</div>
</body>
</html>
 
 

 
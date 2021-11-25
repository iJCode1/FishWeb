<?php
  $mysqli =  mysqli_connect('localhost', 'root', '', 'prograweb');
  if($mysqli){
    echo "";
  }
  else{
      echo "Error";
  }
?>
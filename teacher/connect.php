<?php

$conn = @mysqli_connect('localhost','root','maher_db') or die('Cannot connect to server');
$link= @mysqli_select_db($conn,'attmgsystem') or die ('Cannot found database');

?>
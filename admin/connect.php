<?php
//establishing connection with database.

$conn = @mysqli_connect('localhost','root','maher_db');
$link = @mysqli_select_db($conn,'attmgsystem') or die ('Cannot found database');

?>
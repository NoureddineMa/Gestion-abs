<?php
//establishing connection with database.

$conn = @mysqli_connect('localhost','root','');
$link = @mysqli_select_db($conn,'attmgsystem') or die ('Cannot found database');

?>
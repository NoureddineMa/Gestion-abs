<?php
//establishing connection with database.

@mysqli_connect('localhost','root','maher_db');
$link = @mysqli_select_db($link,'attmgsystem') or die ('Cannot found database');

?>
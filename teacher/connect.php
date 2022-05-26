<?php

$link = @mysql_connect('localhost','root','') or die('Cannot connect to server');
$link= @mysql_select_db('attmgsystem') or die ('Cannot found database');

?>
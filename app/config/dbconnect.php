<?php
$db = mysqli_connect('localhost', 'root','','desafio_php') or die(mysqli_error($db));

$GLOBALS['db'] = $db;
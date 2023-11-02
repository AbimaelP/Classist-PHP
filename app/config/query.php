 <?php 
require_once('dbconnect.php');

function query($sql){
    return mysqli_query($GLOBALS['db'], $sql);
}
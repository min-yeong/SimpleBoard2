<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';

//echo $_POST;
session_start();
if(!isset($_POST['id']) || !isset($_POST['pw'])) exit; 

$id=$_POST['id'];
$pw=$_POST['pw'];

$check = "SELECT * FROM usersdb WHERE Id='$id'";
$result = $db->query($check);
$row = $result->fetch_array();

if($row['Id']==$id && $row['Password']==$pw) {
    $_SESSION['id']=$id;

    // $obj = new ;
    $obj["ok"] = 1;
    $obj["id"] = $id;
    $myobj = json_encode($obj); 

    echo $myobj;
    ?>
<?php
}
else {
    // $obj = new ;
    $obj["ok"] = 0;
    $myobj = json_encode($obj); 

    echo $myobj;
}
?>
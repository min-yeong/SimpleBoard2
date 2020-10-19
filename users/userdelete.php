<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';
session_start();

$id = $_SESSION['id'];

$sql = "DELETE FROM usersdb WHERE Id='$id'";
//echo $sql;
$result = $db->query($sql);

if($result) {
?>      
    <script>
        alert('탈퇴되었습니다.');
        location.replace('/simpleboard/login/login.php');
    </script>
<?php   
    include 'C:/xampp/htdocs/simpleboard/login/logout.php';   
}
else{
?>              
    <script>
        alert("탈퇴되지 않았습니다.");
        location.replace('/simpleboard/login/login.php');
    </script>
<?php
}
?>
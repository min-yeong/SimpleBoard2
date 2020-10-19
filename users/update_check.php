<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';
session_start();

$id = $_SESSION['id'];

$password = $_POST['password'];
$name = $_POST['name'];
$company = $_POST['company'];

$sql = "UPDATE usersdb SET Password='$password', UserName='$name', Company='$company' WHERE Id='$id'";
$result = $db->query($sql);

$sql2 = "UPDATE testdb SET UserName='$name', Company='$company' WHERE Id='$id'";
$result2 = $db->query($sql2);
 
//저장이 됬다면 (result = true) 가입 완료
if($result && $result2) {
?>      
    <script>
        alert('회원정보 수정이 완료되었습니다.');
        location.replace('/simpleboard/board/test.php');
    </script>
<?php   }
else{
?>              
    <script>
        alert("회원정보 수정에 실패했습니다.");
        location.replace('/simpleboard/users/update.php');
    </script>
<?php
}
?>

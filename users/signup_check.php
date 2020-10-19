<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';

$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$company = $_POST['company'];

$query = "INSERT INTO usersdb (UserNumber, Id, Password, UserName, Company) VALUES ('', '$id', '$pw', '$name', '$company')";
$result = $db->query($query);
 
//저장이 됬다면 (result = true) 가입 완료
if($result) {
?>      
    <script>
        alert('회원가입이 완료되었습니다.');
        location.replace('/simpleboard/login/login.php');
    </script>
<?php   }
else{
?>              
    <script>
        alert("회원가입에 실패했습니다.");
    </script>
<?php
}
?>
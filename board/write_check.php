<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';
session_start();

$id = $_SESSION['id'];

$sql = "SELECT Company, UserName from usersdb WHERE Id='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();

$title = $_POST['title'];
$content = $_POST['content'];
$company = $row['Company'];
$username = $row['UserName'];

$query = "INSERT INTO testdb (UserNumber, Title, Content, Company, UserName, Id, Date, Hit) 
            VALUES ('', '$title', '$content', '$company', '$username', '$id', now(), 0)";
$result2 = $db->query($query);
 
//저장이 됬다면 (result = true) 가입 완료
if($result2) {
?>      
    <script>
        alert('게시판 등록이 완료되었습니다.');
        location.replace('/simpleboard/board/test.php');
    </script>
<?php   }
else{
?>              
    <script>
        alert("게시판 등록에 실패했습니다.");
        location.replace('/simpleboard/board/write.php');
    </script>
<?php
}
?>
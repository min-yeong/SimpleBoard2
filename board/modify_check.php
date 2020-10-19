<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';

$usernumber = $_POST['usernumber'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "UPDATE testdb SET Title='$title', Content='$content' WHERE UserNumber='$usernumber'";
$result = $db->query($sql);

//echo $sql;

if($result) {
?>      
    <script>
        alert('게시물 수정이 완료되었습니다.');
        location.replace('/simpleboard/board/test.php');
    </script>
<?php   }
else{
?>              
    <script>
        alert("게시물 수정에 실패했습니다.");
        location.replace('/simpleboard/users/update.php');
    </script>
<?php
}
?>
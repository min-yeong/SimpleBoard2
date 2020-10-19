<?php
include 'C:/xampp/htdocs/simpleboard/dbconn.php';

$usernumber = $_GET['usernumber'];

$sql = "DELETE FROM testdb WHERE UserNumber='$usernumber'";
$result = $db->query($sql);

if($result) {
?>      
    <script>
        alert('게시판이 삭제되었습니다.');
        location.replace('/simpleboard/board/test.php');
    </script>
<?php   
}
else{
?>              
    <script>
        alert("게시판 삭제가 실패했습니다.");
        location.replace('/simpleboard/board/test.php');
    </script>
<?php
}
?>
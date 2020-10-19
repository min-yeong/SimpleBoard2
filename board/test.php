<?php
	include 'C:/xampp/htdocs/simpleboard/header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>게시판</title>
	<style>
		thead {
            background-color: #17a2b8;
            height: 100vh;
        }
		th {
			text-align : center;
		}
	</style>
</head>
<body>
<?php
    $currentPage = 1;
     if (isset($_GET["currentPage"])) {
         $currentPage = $_GET["currentPage"];
    }
            
	$sqlCount = 'SELECT count(*) FROM testdb';
	$resultCount = $db->query($sqlCount);
    if($rowCount = $resultCount->fetch_array(MYSQLI_ASSOC)){
        $totalRowNum = $rowCount["count(*)"];  
    }
                        
    $rowPerPage = 10;
    $begin = ($currentPage -1) * $rowPerPage;

    $sql = "SELECT * FROM testdb order by UserNumber desc limit ".$begin.",".$rowPerPage."";
    $result = $db->query($sql);
    ?>
	
	<article class="container">
		<table class="table table-boardered">
		<thead>
			<tr class="text-center">
				<th scope="col" class="no">번호</th>
				<th scope="col" class="title">제목</th>
				<th scope="col" class="company">소속</th>
				<th scope="col" class="name">작성자</th>
				<th scope="col" class="id">아이디</th>
				<th scope="col" class="date">작성일</th>
				<th scope="col" class="hit">조회</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while($row = $result->fetch_assoc())	{
			?>
			<tr class="text-center" style="cursor:pointer;" onClick="location.href='./read.php?usernumber=<?php echo $row['UserNumber']?>'" 
			onMounseOver="indow.status = 'http://ihouse.so.vc'" onMouseOut ="window.status = ''" >
		        <td class="no"><?php echo $row['UserNumber']?></td>
				<td class="title"><?php echo $row['Title']?></td>
				<td class="company"><?php echo $row['Company']?></td>
				<td class="name"><?php echo $row['UserName']?></td>
				<td class="id"><?php echo $row['Id']?></td>
				<td class="date"><?php echo $row['Date']?></td>
				<td class="hit"><?php echo $row['Hit']?></td></a>
			</tr>
		        <?php
				}
				?>
		</tbody>
		</table>
		<?php
        if($currentPage > 1 ) { 
            echo "<a class='btn btn-primary; btn btn-info;' href ='./test.php?currentPage=".($currentPage-1)."'>이전</a>";
        }
        $lastPage = ($totalRowNum-1) / $rowPerPage-1;

        if (($totalRowNum-1) % $rowPerPage !=0) { 
            $lastPage += 1;
        }
		   
		if($currentPage < $lastPage) { 
            echo "<a class='btn btn-primary; btn btn-info;' href='./test.php?currentPage=".($currentPage+1)."'>다음</a>";
        }
        mysqli_close($db);
        ?>
	</article>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>	
	<script src="/simpleboard/js/bootstrap.js"></script>	
</body>
</html>
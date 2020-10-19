<?php
   include 'C:/xampp/htdocs/simpleboard/dbconn.php';
    session_start();

    $usernumber = $_GET['usernumber'];

    $sql = "SELECT * from testdb WHERE UserNumber='$usernumber'";
    $result = $db->query($sql);
    $row = $result->fetch_array();
    
    $sql2 = "UPDATE testdb SET Hit = Hit + 1 WHERE UserNumber = '$usernumber'";
    $result2 = $db->query($sql2); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/simpleboard/bootstrap/css/bootstrap.css"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            background-color: #17a2b8;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 50px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -15px;
        }
    </style>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-15">
                        <form id="login-form" class="form" action="write_check.php" method="post">
                            <h3 class="text-center text-muted"><?php echo $row['Title'];?></h3><br>
                            <div class="form-group">
                                <label for="name" class="text-info">작성자</label>
                                <?php echo $row['UserName'];?><br>
                                <label for="date" class="text-info">작성일</label>
                                <?php echo $row['Date'];?><br>
                                <label for="hit" class="text-info">조회수</label>
                                <?php echo $row['Hit'];?><br>
                            </div>
                            <div class="form-group">
                                <label for="content" class="text-info">내용</label>
                                <?php echo $row['Content'];?>
                            </div>
                            <div class="form-group">
                            <?php 
                          if($row['Id'] == $_SESSION['id']) {
                          ?>
                                <button type="button" class="btn btn-info" onClick="location.href='./modify.php?usernumber=<?php echo $row['UserNumber']?>'">수정</button>
                                <button type="button" class="btn btn-info" onClick="location.href='./delete.php?usernumber=<?php echo $row['UserNumber']?>'">삭제</button>
                            <?php
                            }     
                            ?>    
                            </div>
                            <button type="button" class="btn pull-right btn-md" onClick="location.href='/simpleboard/board/test.php'">되돌아가기</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/simpleboard/js/bootstrap.js"></script>   
</body>
</html>
<?php
	include 'C:/xampp/htdocs/simpleboard/dbconn.php';
    session_start();
    
    $usernumber = $_GET['usernumber'];

    //echo $usernumber;
    $sql = "SELECT * from testdb WHERE UserNumber='$usernumber'";
    $result = $db->query($sql);
    $row = $result->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-15">
                        <form id="login-form" class="form" action="modify_check.php" method="POST">
                            <h3 class="text-center text-info">게시판 수정</h3>
                            <div class="form-group">
                                <label for="usernumber" class="text-info"></label><br>
                                <input type="hidden" name="usernumber" value="<?=$usernumber?>">
                            </div>
                            <div class="form-group">
                                <label for="id" class="text-info">ID</label><br>
                                <?php echo $_SESSION['id'];?>
                            </div>
                            <div class="form-group">
                                <label for="title" class="text-info">Title</label><br>
                                <input type="title" placeholder="<?php echo $row['Title'];?>" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content" class="text-info">Content</label><br>
                                <input type="content" placeholder="<?php echo $row['Content'];?>" name="content" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="작성완료" class="btn btn-info btn-md" value="작성완료">
                                <input type="reset" value="다시쓰기" class="btn btn-info btn-md"/>
                                <button type="button" name="로그인" class="btn pull-right btn-md" onClick="location.href='/simpleboard/board/test.php'">목록화면으로 되돌아가기</button>
                            </div>
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
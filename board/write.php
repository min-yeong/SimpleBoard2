<?php
	include 'C:/xampp/htdocs/simpleboard/dbconn.php';
    session_start();
    
    if(!isset($_SESSION['id'])) {
        header('location : http://localhost/simpleboard/login/login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>새로운 게시판 등록</title>
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
                            <h3 class="text-center text-info">새로운 게시판 등록</h3>
                            <div class="form-group">
                                <label for="id" class="text-info">ID</label><br>
                                <name="id" id="id" class="form-control"><?php echo $_SESSION['id'];?>
                            </div>
                            <div class="form-group">
                                <label for="title" class="text-info">Title</label><br>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content" class="text-info">Content</label><br>
                                <textarea name=content cols=85 rows=15 class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="작성완료" class="btn btn-info btn-md" value="작성완료">
                                <input type="reset" value="다시쓰기" class="btn btn-info btn-md"/>
                                <button type="button" name="로그인" class="btn pull-right btn-md" onClick="location.href='/simpleboard/board/test.php'">되돌아가기</button>
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
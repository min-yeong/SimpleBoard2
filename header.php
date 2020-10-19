<?php
	include 'C:/xampp/htdocs/simpleboard/dbconn.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>title</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar-default { background-color: #e74c3c; }
  </style>
</head>

<body>
  <div style="margin:20px;">
    <nav id="navbar-example" class="navbar navbar-default navbar-static">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/simpleboard/board/test.php">SimpleBoard</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          <?php 
		        if(!isset($_SESSION['id'])) {
		      ?>
            <li><a href="/simpleboard/login/login.php">로그인</a></li>
            <li><a href="/simpleboard/users/signup.html">회원가입</a></li>
		      <?php
		        } 	 
		      else { 
          ?>
            <li><a href="/simpleboard/board/write.php">게시판올리기</a></li>
            <li><a href="/simpleboard/login/logout.php">로그아웃</a></li>
            <li><a href="/simpleboard/users/update.php">개인정보수정</a></li>
		      <?php
		      }
		      ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</body>
</html>


<?php
    session_start();
    if(isset($_SESSION['id'])) {
        header('location : http://localhost/simpleboard/board/test.php');
    }    
?>
<!DOCTYPE html>
<html>
<head>
    <title>login page</title>
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
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 60px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -15px;
        }
    </style>
</head>

<body>
    <div id="login" class="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login_check.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="id" class="text-info">ID</label><br>
                                <input type="text" name="id" id="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pw" class="text-info">Password</label><br>
                                <input type="password" name="pw" id="pw" class="form-control">
                                <span id="log" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="로그인" class="btn btn-info btn-md" value="로그인">
                                <button type="button" name="회원가입" class="btn btn-info btn-md" onClick="location.href='/simpleboard/users/signup.html'">회원가입</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!--    <script src="/simpleboard/js/bootstrap.js"></script>	
  -->  
    <script>
        $(function() {
            var $frm = $('#login-form');
            $frm.on("submit", function(e) {
                e.preventDefault();
                var myData = $frm.serialize();
                //console.log('---login--');
                //console.log(myData);
                $.ajax({
                    type: 'POST',
                    url : '/simpleboard/login/login_check.php',
                    data : myData,
                    success : function(res) {
                        console.log(res);
                        var jsonData = JSON.parse(res);
                        
                        //var message = jsonData['id'] + "님이 로그인하였습니다.";

                        if(jsonData['ok']==1) {
                            //console.log(message);
                            //$("#login").html(message);
                            location.replace('/simpleboard/board/test.php');
                        }else {
                            $("#log").html("로그인에 실패했습니다.");
                        }
                            
                    },
                    error : function(res) {
                        console.log(res);
                    } 
                });
            }); 
        });
    </script>
</body>
</html>
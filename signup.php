<?php 
    session_start(); 
?>
<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SignUp</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .container{margin-top:100px;}
        </style>
    </head>
    <body>
      
        <div class="container">
            <div class="card">
                <div class="card-header"><strong>Sign Up</strong></div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="idAddUsername" aria-describedby="emailHelp" placeholder="Enter Username" required>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="idAddEmail" aria-describedby="emailHelp" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="idAddPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Re-Type Password</label>
                            <input type="password" class="form-control" id="idAddPassword2" placeholder="Password" required>
                        </div>
                        <span class="d-flex">
                            <button type="submit" id="idSignUpBtn" class="btn btn-primary">Signup</button>
                            <button style="margin-left: 20px;" type="submit" id="idSignUpBtn" class="btn btn-primary" style="float: right;" onclick="window.history.back();">Go Back</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>

        <script>
            $('#idSignUpBtn').click(function (e) {
                e.preventDefault();
                let sUsername = $('#idAddUsername').val();
                let sAddEmail = $('#idAddEmail').val();
                let sAddPassword1 = $('#idAddPassword1').val();
                let sAddPassword2 = $('#idAddPassword2').val();
                if (sAddPassword1 == sAddPassword2) {
                    $.ajax({
                        url: 'ajaxCall.php',
                        type:'post',
                        data:{
                            sType : 'addNewUser',
                            sUsername : sUsername,
                            sAddEmail : sAddEmail,
                            sAddPassword1 : sAddPassword1
                        },
                        async:false,
                        beforeSend:function(){
                            console.log('start');
                        },
                        success:function(result){
                            result = JSON.parse(result);
                            if(result.code == 111){
                                alert('Sign Up Successfully please login now');
                                window.location.href = "login.php";
                            }else{
                                alert('Something went wrong');
                            }
                        },
                        error:function(xhr){
                            alert("Error occured.please try again");
                            console.log(xhr.statusText + xhr.responseText);
                        },
                        commplete:function(){
                            console.log('completed');
                        }
                    });
                } else {
                    alert('Password and Re-type Password does not matched');
                }
            });
        </script>

       
   </body>
</html>
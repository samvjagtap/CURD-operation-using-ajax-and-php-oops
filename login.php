<?php 
    session_start(); 
?>
<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
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
                <div class="card-header"><strong>Login</strong></div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="idUsername" aria-describedby="emailHelp" placeholder="Enter Username" required>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="idPassword" placeholder="Password" required>
                        </div>
                        <span class="d-flex">
                            <button type="submit" id="idLoginBtn" class="btn btn-primary">Signin</button>
                            Create New Account 
                            <a href="signup.php" type="submit" id="idSignUpBtn" class="btn btn-primary" style="float: right;">Signup</a>
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
            $('#idLoginBtn').click(function (e) {
                e.preventDefault();
                let sUsername = $('#idUsername').val();
                let sPassword = $('#idPassword').val();

                $.ajax({
                    url: 'ajaxCall.php',
                    type:'post',
                    data:{
                        sType : 'login',
                        sUsername : sUsername,
                        sPassword : sPassword  
                    },
                    async:false,
                    beforeSend:function(){
                        console.log('start');
                    },
                    success:function(result){
                        result = JSON.parse(result);
                        // console.log(result);
                        let data = result.data;
                        console.log(data);
                        let username = data.username;
                        let email = data.email;
                        let user_id = data.user_id;
                        if(result.code == 111){
                            setStorageKeyValue('username',username);
					        setStorageKeyValue('email',email);
                            setStorageKeyValue('user_id',user_id);
                            fSetSession(username);
                            // alert($.session.get("username"));
                            window.location.href = "showAllProducts.php";
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
            });
            function clearStorage(){
                localStorage.clear();
            }
            function getStorageKey(sKey){
                return localStorage.getItem(sKey);
            }
            function setStorageKeyValue(sKey,sValue){
                localStorage.setItem(sKey,sValue);
            }
            function fSetSession(username) {
                let sUsername = getStorageKey('username');
                let iuserID = getStorageKey('user_id');
                // alert(sUsername,iuserID);
                $.ajax({ 
                    url:'ajaxCall.php', 
                    type:'POST',
                    data: {
                        sType : 'setSession',
                        username : sUsername,
                        iID : iuserID
                    },  
                    success:function(response){ 
                        console.log(response); 
                    } 
                }); 
            }
        </script>
   </body>
</html>
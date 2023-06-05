<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location:login.php');
    }

?>
<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>E-Commerce System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="datatables.css">
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
                <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add New Product</strong> <a href="showAllProducts.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Product</a></div>
                <div class="card-body">
                <div class="col-sm-6">
                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="idProductName" class="form-control" placeholder="Enter Product name" required>
                        </div>
                        <div class="form-group">
                            <label>Price <span class="text-danger">*</span></label>
                            <input type="number" id="idProductPrice" class="form-control" placeholder="Enter Price" required>
                        </div>
                        <div class="form-group">
                            <label>Manufacturing Date <span class="text-danger">*</span></label>
                            <input type="date" class="tel form-control" name="mobile" id="idManufacturingDate"  placeholder="Enter Manufacturing Date" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" id="idAddProduct" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add Product</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
        <script src="datatables.js"></script>

        <script>

            $('#idAddProduct').click(function (e) {
                e.preventDefault();
                let sProductName = $('#idProductName').val();
                let iProductPrice = $('#idProductPrice').val();
                let dManufacturingDate = $('#idManufacturingDate').val();

                // alert(sProductName);
                // alert(iProductPrice);
                // alert(dManufacturingDate);

                if(sProductName != '' && iProductPrice != '' && dManufacturingDate != ''){
                    $.ajax({
                        url: 'ajaxCall.php',
                        type:'post',
                        data:{
                            sType : 'addProduct',
                            sProductName : sProductName,
                            iProductPrice : iProductPrice,
                            dManufacturingDate : dManufacturingDate
                        },
                        async:false,
                        beforeSend:function(){
                            console.log('start');
                        },
                        success:function(result){
                            // console.log('result',typeof(result));
                            result = JSON.parse(result);
                            if(result.code == 111){
                                alert('Product added Successfully');
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
                }else {
                    alert('Please, Provide all data');
                }
            });

        </script>


   </body>
</html>
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
            .container{margin-top:70px;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">Welcome <span id="idUsername"><?php echo $_SESSION['username'] ?></span> 
                <i class="fa fa-fw fa-globe"></i> <strong>Browse Product</strong> 
                <a href="logout.php" class="float-right btn btn-dark btn-sm" style="margin-left: 20px;">Logout</a>
                <a href="addProduct.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add New Product</a>
                </div>
            </div>
            <hr>
            <div>
                <table class="table table-striped table-bordered" id="idProductDataTable">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Sr#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Manufacturing Date</th>
                        <th class="text-center">Added On</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td>Vishal</td>
                        <td>phpvishal@gmail.com</td>
                        <td>1234567890</td>
                        <td align="center">30st March 2020</td>
                        <td align="center">
                            <a href="" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                            <a href="" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
                        </td>
                    </tr> -->
                    <!--<tr>
                        <td colspan="6" align="center">No Records Found!</td>
                    </tr>-->
                </tbody>
                </table>
            </div>
            <!--/.col-sm-12-->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
        <script src="datatables.js"></script>

    <script>

        // let sUsername = getStorageKey('username');
        // $('#idUsername').text(sUsername);
        
        function fGetAllProducts() {
            
            let header = ['pro_id', 'pro_name', 'pro_price', 'added_on','pro_man_date'];
            let aHeaders = ['pro_id', 'pro_name', 'pro_price', 'added_on', 'pro_man_date'];

            let sCondition = '';
            let sLike = ''; 
            let sOrderBy = 'added_on';
            let sOrderByType = 'desc';
            let iLimit = '';
            
            $('.pagination .paginate_button a').addClass('pagination-text');
            let colum = [];
            $.each(header,function(i,value){
                colum.push({data:value});
            });
            var iTarget = colum.length -1;
            $('#idProductDataTable').DataTable({
                Processing : true,
                serverSide : true,
                bDestroy : true,
                responsive : true,
                paging : true,
                ordering : false,
                pagingType : "simple_numbers",
                pageLength : 10,

                ajax:{
                    url	: 'ajaxCall.php',
                    type : 'post',
                    data : {
                        sType : 'showProduct',
                        aFields : aHeaders,
                        sCondition : sCondition,
                        sLike : sLike,
                        sOrderBy : sOrderBy,
                        sOrderByType : sOrderByType,
                        iLimit : iLimit,
                        datatable_use : true
                    },
                    async:false,
                    beforeSend:function(){
                        console.log('datatable before call');
                    },

                    "dataSrc": function(data){
                        // console.log('data======>>>>',data);
                        return data.data;
                    },

                    error:function(xhr){
                        alert("Error occured.please try again");
                        console.log(xhr.statusText + xhr.responseText);
                    },

                    commplete:function(){
                        console.log('completed_login_call');
                    }
                }, 
                columns : [
                    {
                        data : 'sr_no',
                        render : function (data, type, row) {
                            return '<div class="text-sm text-secondary mb-0 text-center" style="margin-top: 12px;">'+data+'</div>';
                        }
                    },
                    {
                        data : 'pro_name',
                        render : function (data, type, row) {
                            if(data!=null && data!='undefined'&& data!=''){
                                return '<div class="text-sm text-secondary mb-0 text-center" style="margin-top: 12px;">'+data+'</div>';
                            }else{
                                return null;
                            }
                        }
                    },
                    {
                        data : 'pro_price',
                        render : function (data, type, row) {
                            if(data!=null && data!='undefined'&& data!=''){
                                return '<div class="text-sm text-secondary mb-0 text-center" style="margin-top: 12px;">'+data+'</div>';;
                            }else{
                                return null;
                            }
                        }
                    },
                    {
                        data : 'pro_man_date',
                        render : function (data, type, row) {
                            if(data!=null && data!='undefined'&& data!=''){
                                return '<div class="text-sm text-secondary mb-0 text-center" style="margin-top: 12px;">'+data+'</div>';;
                            }else{
                                return null;
                            }
                        }
                    },
                    {
                        data : 'added_on',
                        render : function (data, type, row) {
                            if(data!=null && data!='undefined'&& data!=''){
                                return '<div class="text-sm text-secondary mb-0 text-center" style="margin-top: 12px;">'+data+'</div>';;
                            }else{
                                return null;
                            }
                        }
                    },
                    {
                        data : 'report_request_id',
                        render : function (data, type, row) {
                            return '<a href="updateProduct.php?id='+row['pro_id']+'" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | \
                            <a style="cursor: pointer;" onclick="fDeleteProdict('+row['pro_id']+')" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>';
                        }
                    }
                ],
                'dom':'tip',
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '</span><span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    }
                }
            });
        }

        function getStorageKey(sKey){
            return localStorage.getItem(sKey);
        }

        function fDeleteProdict(iID) {
            if (confirm('Do you really want to delete this product')) {
                $.ajax({
                    url: 'ajaxCall.php',
                    type:'post',
                    data:{
                        sType : 'deleteProduct',
                        iID : iID
                    },
                    async:false,
                    beforeSend:function(){
                        console.log('start');
                    },
                    success:function(result){
                        // console.log('result',typeof(result));
                        result = JSON.parse(result);
                        if(result.code == 111){
                            alert('Product deleted Successfully');
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
            } else {
                alert('Thanks for your confirmation');
            }
        }

        fGetAllProducts();

    </script>


   </body>
</html>
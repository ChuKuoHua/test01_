<?php
    $connect = mysqli_connect("localhost","root","","txt");
    $query = "SELECT*FROM client ORDER BY name asc";
    $result = mysqli_query($connect,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <style>
        #result {
            position:absolute;
            width:100%;
            max-width:800px;
            cursor:pointer;
            overflow-y:auto;
            max-height:350px;
            box-sizing: border-box;
            z-index:1001;
        }
        .link-class:hover{
            background-color:#000;
            
        }
    </style>

</head>
<body>  
    

    <br/>
    <div class ="container" style=" width:850px;">
        <h2 align="center">ajax and php</h2>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <select name="client_list" id="client_list" class="form-control">
                    <option value="">
                        Select client
                    </option>
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <button type="button" name="search" id="search" class="btn btn-info">
                    搜尋
                </button>
            </div>
        </div>
            <br/>
            <div class="table-responsive" id="client_details" style="display:none">
                <table class="table table-bordered">
                    <tr>
                        <td width="10%" align="right"><b>name</b></td>
                        <td width ="90%"><span id="client_name"></span></td>
                    </tr>
                    <tr>
                        <td width="10%" align="right"><b>phone</b></td>
                        <td width ="90%"><span id="client_phone"></span></td>
                    </tr>
                    <tr>
                        <td width="10%" align="right"><b>email</b></td>
                        <td width ="90%"><span id="client_email"></span></td>
                    </tr>
                </table>
            </div>        
    </div>

    <script>
        $(document).ready(function(){
            $('#search').click(function(){
                var id =$('#client_list').val();
                if(id != '')
                {
                    $.ajax({
                        url:"ready.php",
                        method:"POST",
                        data:{id:id},
                        dataType:"JSON",
                        success:function(data)
                        {
                            $('#client_details').css("display","block");
                            $('#client_name').text(data.name);
                            $('#client_phone').text(data. phone);
                            $('#client_email').text(data. email);
                        }
                    })
                }
                else{
                    alert("please select client");
                    $('#client_details').css("display","none");
                }
            });
        });
    </script>

</body>
</html>
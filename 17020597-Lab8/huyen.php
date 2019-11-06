<!-- <!DOCTYPE html>
<html lang="vi"> -->
<?php 
include("connect.php"); 
$tinh = $_POST("var");
echo $tinh;
?>
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách huyện</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-size: 13px;
            font-family: 'Courier New', Courier, monospace;
        }

        a,
        a:hover {
            text-decoration: none;
        }

        .header {
            height: 60px;
            background-color: #008b8b;
        }

        .content {
            overflow: auto;
        }

        .content .toolbar {
            height: 50px;
            border-bottom: 1px solid #d0d0d0;
            width: 100%;
        }

        .footer {
            height: 50px;
            background-color: #808080;
        }

        table th,
        td {
            text-align: center;
            height: 35px;
        }

        .btn-delete:hover,.btn-edit:hover  {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="header row fixed-header d-flex justify-content-center">
            <h3 class="text-white font-weight-bold my-auto">Danh mục huyện</h3>
        </div>
        <div class="content row">
                <div class="toolbar">
                <nav class="navbar navbar-expand-sm">
                        <button class="col-sm-1 btn btn-success" data-toggle="modal" data-target="#modalAdd" >Thêm mới</button>
                        <div class="col-sm"></div>
                        <form class="form-inline col-sm-5" action="find.php" method="post">
                            <input class="form-control mr-sm-1" name="tentheloai" type="text" placeholder="Tìm kiếm theo thể loại sách">
                            <button class="btn bg-secondary text-white" type="submit" onclick = "search()">Tìm</button>
                        </form>
                    </nav>
                </div>
                <table class="table-bordered table-striped w-100">
                    <thead>
                        <tr>
                            <th>Mã huyện</th>
                            <th>Tên huyện</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // $query = "SELECT t.id, t.name, COUNT(h.id) AS total FROM Tinh t LEFT JOIN Huyen h ON t.id = h.tinhid GROUP BY t.id ORDER BY name";
                            // $result = $conn->query($query);
                            // if ($result->num_rows > 0) {
                            //     // output data of each row
                                
                            //     while($row = $result->fetch_assoc()) {
                            //         echo "<tr>";
                            //         echo "<td name='id_tinh'>". $row["id"] ."</td>";
                            //         echo "<td name='ten_tinh'><a href=\"huyen.php\">". $row["name"] ."</a></td>";
                            //         echo "<td name='tong_huyen'>". $row["total"] ."</td>";
                            //         echo "<td onclick='javascript:modalDelete(this)' class='btn-delete' data-toggle=\"modal\" data-target=\"#modalDelete\">X</td>";
                            //         echo "<td class='btn-edit' data-toggle=\"modal\" data-target=\"#modalEdit\" onclick='javascript:modalEdit(this)'>edit</td>";
                            //         echo "</tr>";
                            //     }
                                
                            // }
                        
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>

</html> -->
<!DOCTYPE html>
<?php 
		$conn = new mysqli('127.0.0.1', "root","ngocanh1999", "thuvien");
		mysqli_set_charset($conn, 'UTF8');
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
?>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title>Phòng Khách</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
		.header {
			background-color: #008B8B;
			height: 55px;
		}
		.toolbar {
			background-color: #d0d0d0;
		}
		.main-table {
			width: 100%;
			overflow: auto;
		}
		.main-table tr {
			height: 40px;
			text-align: center;
		}
		.main-table tbody tr:hover {
			background-color: #B0C4DE !important;
			color: #FFF !important;
		}
		.modal-body label {
			width: 150px;
		}
	</style>
</head>
<body>
	
	<div class="container-fluid p-0">

		<div class="header row text-white">
			<div class="font-weight-bold m-auto">Danh sách phòng</div>
		</div>
		<div class="content">
			<div class="toolbar">
				<nav class="navbar navbar-expand-sm row">
					<ul class="navbar-nav col-sm-4">
						<li class="nav-item ml-4">
						<a class="nav-link btn btn-info ml-2" id="add" data-toggle="modal" data-target="#modalAdd">Thêm</a>
						</li>
						<li class="nav-item">
						<a class="nav-link btn btn-info ml-2 disabled" id="edit" data-toggle="modal" data-target="#modalEdit" >Sửa</a>
						</li>
						<li class="nav-item">
						<a class="nav-link btn btn-info ml-2 disabled" id="delete" href="#">Xóa</a>
						</li>
					</ul>
					<div class="col-sm"></div>
					<form class="form-inline col-sm-5" action="#">
						<input class="form-control mr-sm-1" type="text" placeholder="Tìm kiếm">
						<button class="btn bg-secondary text-white" type="submit">Search</button>
					</form>
				</nav>
			</div>
			<div class="main">
				<table class="main-table table-striped table-bordered">
					<thead>
						<tr>
							<th name="">Mã thể loại</th>
							<th name="">Mã sách</th>
							<th name="">Tên sách</th>
							<th name="">Năm xuất bản</th>
							<th ><input id="check-all" type="checkbox" name="check-box" /></th>
						</tr>
					</thead>
					<tbody>
					 <?php
						$query = "SELECT * FROM Sach";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) 
							{
								$matheloai = $row["matheloai"];
								$masach = $row["masach"];
								$tensach = $row["tensach"];
								$namxb = $row["namxb"];
								echo "<tr>";
								echo "<td name='matheloai'>$matheloai</td>";
								echo "<td name='masach'>$masach</td>";
								echo "<td name='tensach'>$tensach</td>";
								echo "<td name='namxb'>$namxb</td>";
								echo '<td ><input type="checkbox" name="check-box" onclick="javascript:checkButton()" /></td>';
								echo "</tr>";									
							}
						}
					 ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal fade" id="modalAdd">
			<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header">
				<h4 class="modal-title">Thêm mới</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<label for="">Chọn thể loại: </label>
					<select class="form-control">
						<?php
							$query = "SELECT tentheloai FROM LoaiSach";
							$result = $conn->query($query);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) 
								{
									echo "<option name='tentheloai' >". $row["tentheloai"] ."</option>";							
								}
							}
						?>
					</select>
					<br />
					<label for="">Mã sách: </label>
					<input type="text" placeholder="Thêm mã sách" name="new-id" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
					<br />
					<label for="">Tên sách: </label>
					<input type="text" placeholder="Thêm tên sách" name="new-name" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
					<br/>
					<label for="">Năm xuất bản: </label>
					<input type="number" placeholder="Năm xuất bản" name="new-year" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" onclick="addData()">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				
			</div>
			</div>
		</div>
		<div class="modal fade" id="modalEdit">
			<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header">
				<h4 class="modal-title">Sửa thông tin</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<label for="">Tên sách: </label>
					<input type="text" placeholder="Sửa tên sách" id="name" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
					<br/>
					<label for="">Năm xuất bản: </label>
					<input type="number" placeholder="Sửa năm xuất bản" id="year" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-success">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				
			</div>
			</div>
		</div>
		<script>

			document.getElementById("check-all").onclick = function() {
				let checkboxes = document.getElementsByName('check-box');
				if(document.getElementById("check-all").checked == true) {

					for (var i = 0; i < checkboxes.length; i++){
						checkboxes[i].checked = true;
					}
					document.getElementById("delete").classList.remove("disabled");
				}
				else {
					for (var i = 0; i < checkboxes.length; i++){
						checkboxes[i].checked = false;
						
					}
					document.getElementById("delete").classList.add("disabled");
					document.getElementById("edit").classList.add("disabled");
				}
			}
			function checkButton() {
				debugger
				let count = countChecked();
				if(count == 1) {
					let me = getCheckedNode();
					document.getElementById("delete").classList.remove("disabled");
					document.getElementById("edit").classList.remove("disabled");
					document.getElementById("name").value = me.parentElement.parentElement.children.tensach.innerText;
					document.getElementById("year").value = me.parentElement.parentElement.children.namxb.innerText;
				}
				else {
					if(count == 0) {
						document.getElementById("delete").classList.add("disabled");
						document.getElementById("edit").classList.add("disabled");
					}
					else {
						document.getElementById("delete").classList.remove("disabled");
						document.getElementById("edit").classList.add("disabled");
					}
				}
			}
			function countChecked() {
				let checkboxes = document.getElementsByName('check-box');
				let count = 0;
				for(let i = 0; i < checkboxes.length; i++) {
					if(checkboxes[i].checked == true) count++;
				}
				return count;
			}
			function getCheckedNode() {
				let checkboxes = document.getElementsByName('check-box');
				for(let i = 0; i < checkboxes.length; i++) {
					if(checkboxes[i].checked == true) return checkboxes[i];
				}
				return null;
			}
		</script>
		<?php
			function addData() {
				$tentheloai = $_POST["tentheloai"];
				$new_id = $_POST["new-id"];
				$new_name = $_POST["new-name"];
				$new_year = $_POST["new-year"];
				$sql = "SELECT matheloai FROM LoaiSach WHERE tentheloai = $tentheloai LIMIT 1";
				$matheloai = $conn->query($sql);

				$query = "INSERT INTO Sach (matheloai, masach, tensach, namxb)
				VALUES ($matheloai, $new_id, $new_name, $new_year)";
				$conn->query($query);
				header('Location: index.php');
			}
		?>
	</div>
</body>
</html>
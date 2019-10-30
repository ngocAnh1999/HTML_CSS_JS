<!DOCTYPE html>
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
						<a class="nav-link btn btn-info ml-2 disabled" id="edit" href="#">Sửa</a>
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
						<tr>
							<td name="matheloai">1</td>
							<td name="masach">1</td>
							<td name="tensach">sách A</td>
							<td name="namxb">2000</td>
							<td ><input type="checkbox" name="check-box" /></td>
						</tr>
						<tr>
							<td name="matheloai">1</td>
							<td name="masach">2</td>
							<td name="tensach">sách B</td>
							<td name="namxb">2002</td>
							<td ><input type="checkbox" name="check-box"/></td>
						</tr>
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
						<option>Thể loại 1</option>
						<option>Thể loại 2</option>
					</select>
					<br />
					<label for="">Tên sách: </label>
					<input type="text" placeholder="Thêm tên sách" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
					<br/>
					<label for="">Năm xuất bản: </label>
					<input type="number" placeholder="Năm xuất bản" class="px-2" />
					&nbsp;<span class="text-danger">(*)</span>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				
			</div>
			</div>
		</div>
		<script>

			document.getElementById("check-all").onclick = function() {
				debugger
				let checkboxes = document.getElementsByName('check-box');
				if(document.getElementById("check-all").checked == true) {

					for (var i = 0; i < checkboxes.length; i++){
						checkboxes[i].checked = true;
					}
					document.getElementById("delete").removeClass("disabled");
				}
				else {
					for (var i = 0; i < checkboxes.length; i++){
						checkboxes[i].checked = false;
						
					}
					document.getElementById("delete").addClass("disabled");
					document.getElementById("edit").addClass("disabled");
				}
			}
		</script>
	</div>
</body>
</html>
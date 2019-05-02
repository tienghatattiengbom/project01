@extends('admin.layout.index')

@section('content')


<section class="content-header">
	<h1>
		Quản Lý Thưởng
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Lương</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/phongban/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Tên Phòng Ban</th>
								<th>Mã Phòng Ban</th>
								<th>Số Điện Thoại Phòng Ban</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($phongbans as $phongban)
								<tr>
									<td>{{$phongban->ten_phongban}}</td>
									<td>{{$phongban->ma_phongban}}</td>
									<td>0{{$phongban->sdt_phongban}}</td>
									<td>
										<a href="/admin/phongban/show/{{$phongban->id}}" ><i class="fas fa-eye"></i></a> 
										<a href="/admin/phongban/update/{{$phongban->id}}" ><i class="fas fa-pencil-alt"></i></a>
										<a href="/admin/phongban/delete/{{$phongban->id}}" ><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@endsection
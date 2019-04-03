@extends('admin.layout.index')

@section('content')


<section class="content-header">
	<h1>
		Quản Lý Nhân Sự
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Nhân Sự</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/nhansu/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Tên Nhân Viên</th>
								<th>Địa Chỉ</th>
								<th>Số điện thoại</th>
								<th>Email</th>
								<th>Ngày sinh</th>
								<th>Giới Tính</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($nhansus as $nhansu)
						    <tr>
								<td>{{$nhansu->name}}</td>
								<td>{{$nhansu->addrees}}</td>
								<td>{{$nhansu->phone}}</td>
								<td>{{$nhansu->email}}</td>
								<td>{{$nhansu->birthday}}</td>
								<td>
									@if($nhansu->sex == "M")
										Nam
									@else
										Nữ
									@endif
								</td>
								<td>
									<a href="/admin/nhansu/show/{{$nhansu->id}}" ><i class="fas fa-eye"></i></a> 
									<a href="/admin/nhansu/update/{{$nhansu->id}}" ><i class="fas fa-pencil-alt"></i></a>
									<a href="/admin/nhansu/delete/{{$nhansu->id}}" ><i class="fas fa-trash-alt"></i></a>
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
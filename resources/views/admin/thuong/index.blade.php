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
		<a href="/admin/thuong/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Tên Nhân Viên</th>
								<th>Tiền Thưởng </th>
								<th>Ngày</th>
								<th>Ghi chú</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($thuongs as $thuong)
							<tr>
								<td>{{$thuong->nhansu->name}}</td>
								<td>{{$thuong->tien_thuong}}</td>
								<td>{{$thuong->date}}</td>
								<td>{{$thuong->note}}</td>
								<td>
									<a href="/admin/thuong/show/{{$thuong->id}}" ><i class="fas fa-eye"></i></a> 
									<a href="/admin/thuong/update/{{$thuong->id}}" ><i class="fas fa-pencil-alt"></i></a>
									<a href="/admin/thuong/delete/{{$thuong->id}}" ><i class="fas fa-trash-alt"></i></a>
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
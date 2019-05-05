@extends('admin.layout.index')

@section('content')


<section class="content-header">
	<h1>
		Quản Lý Hợp Đồng
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Hợp Đồng</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/hopdong/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nhân Viên</th>
								<th>Mã Hợp Đồng</th>
								<th>Tên Hợp Đồng</th>
								<th>Ngày Ký</th>
								<th>Ngày Hết Hạn</th>
								<th>Trạng Thái</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($hopdongs as $hopdong)
								<tr>
									<td>{{isset($hopdong->nhansus->name) ? $hopdong->nhansus->name : 0}}</td>
									<td>{{$hopdong->ma_hd}}</td>
									<td>{{$hopdong->ten_hd}}</td>
									<td>{{$hopdong->ngay_ki}}</td>
									<td>{{$hopdong->ngay_het_han}}</td>
									<td><?=($hopdong->status == 1) ? 'Kích Hoạt' : 'Không Kích Hoạt' ?></td>
									<td>
										<a href="/admin/hopdong/update/{{$hopdong->id}}" ><i class="fas fa-pencil-alt"></i></a>
										<a href="/admin/hopdong/delete/{{$hopdong->id}}" ><i class="fas fa-trash-alt"></i></a>
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
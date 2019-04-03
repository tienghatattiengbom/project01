@extends('admin.layout.index')

@section('content')
<?php 
	// echo "<prE>"; print_r($chamcong);die;
?>

<section class="content-header">
	<h1>
		Bảng Lương
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Bảng Lương</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/luong/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> Tính lương</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Tên Nhân Viên</th>
								<th>Tháng Tính Lương</th>
								<th>Lương</th>
								<th>Ngày Công</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($luongs as $luong)
						    <tr>
								<td>{{$luong->nhansus->name}}</td>
								<td>{{date('m-Y', strtotime($luong->date))}}</td>
								<td>{{$luong->luong}}</td>
								<td>{{$luong->ngay_cong}}</td>
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
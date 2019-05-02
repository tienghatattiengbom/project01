@extends('admin.layout.index')

@section('content')


<section class="content-header">
	<h1>
		Quản Sổ Bảo Hiểm
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Sổ bảo hiểm</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/sobaohiem/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nhân Viên</th>
								<th>Mã Sổ Bảo Hiểm</th>
								<th>Ngày Cấp</th>
								<th>Nơi Cấp</th>
								<th>Ghi Chú</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($sobaohiems as $sobaohiem)
								<tr>
									<td>{{$sobaohiem->nhansus->name}}</td>
									<td>{{$sobaohiem->ma_sbh}}</td>
									<td>{{$sobaohiem->ngay_cap}}</td>
									<td>{{$sobaohiem->noi_cap}}</td>
									<td>{{$sobaohiem->note}}</td>
									<td>
										<a href="/admin/sobaohiem/show/{{$sobaohiem->id}}" ><i class="fas fa-eye"></i></a> 
										<a href="/admin/sobaohiem/update/{{$sobaohiem->id}}" ><i class="fas fa-pencil-alt"></i></a>
										<a href="/admin/sobaohiem/delete/{{$sobaohiem->id}}" ><i class="fas fa-trash-alt"></i></a>
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
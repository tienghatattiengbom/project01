@extends('admin.layout.index')

@section('content')
<?php 
	// echo "<prE>"; print_r($chamcong);die;
?>

<section class="content-header">
	<h1>
		Bảng Chấm Công
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Bảng Chấm Công</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/chamcong/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>

	<div class="row">
		{!! Form::open(['method' => 'GET', 'url' => '/admin/chamcong/index']) !!}
		<div class="col-xs-6">
			<div class="form-group row">
				<div class="col-md-3 label-form">
					<?= Form::label('name', 'Tên Nhân Viên') ?>
				</div>
				<div class="col-md-8">
					<?= Form::text('name' ,!empty($_GET['name']) ? $_GET['name'] : null,['class' => 'form-control input-form'])?>
				</div>
			</div>
		</div>

		<div class="col-xs-6">
			<div class="form-group row">
				<div class="col-md-3 label-form">
					<?= Form::label('date', 'Ngày Chấm Công') ?>
				</div>
				<div class="col-md-8">
					<?= Form::text('date',!empty($_GET['date']) ? $_GET['date'] : null,['class' => 'form-control input-form','id' => 'datepicker'])?>
				</div>
			</div>
		</div>
		<div class="col-xs-offset-10 col-xs-1">
            <?= Form::submit('Tìm Kiếm',['class' => 'btn btn-success'])?>
          </div>
		{{ Form::close() }}
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Tên Nhân Viên</th>
								<th>Ngày chấm công</th>
								<th>Giờ vào</th>
								<th>Giờ về</th>
								<th>Ghi chú</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($chamcongs as $chamcong)
						    <tr>
								<td>{{$chamcong->nhansus->name}}</td>
								<td>{{date('d-m-Y', strtotime($chamcong->start_time))}}</td>
								<td>{{date('H:i:s', strtotime($chamcong->start_time))}}</td>
								<td>{{!empty($chamcong->end_time) ? date('H:i:s', strtotime($chamcong->end_time)) : ""}}</td>
								<td>{{$chamcong->note}}</td>
								<td>
									<!-- <a href="/admin/chamcong/show/{{$chamcong->id}}" ><i class="fas fa-eye"></i></a>  -->
									<a href="/admin/chamcong/update/{{$chamcong->id}}" ><i class="fas fa-pencil-alt"></i></a>
									<a href="/admin/chamcong/delete/{{$chamcong->id}}" ><i class="fas fa-trash-alt"></i></a>
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

@section('script')
    <script src="../../admin_asset/plugins/select2/select2.full.min.js"></script>
    <script src="../../admin_asset/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../admin_asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../admin_asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="../../admin_asset/plugins/datepicker/bootstrap-datepicker.js"></script>

    <script>
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
        
    </script>
@endsection
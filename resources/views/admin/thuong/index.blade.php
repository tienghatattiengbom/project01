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
		{!! Form::open(['method' => 'GET', 'url' => '/admin/thuong/index']) !!}
		<div class="col-xs-6">
			<div class="form-group row">
				<div class="col-md-3 label-form">
					<?= Form::label('year', 'Năm') ?>
				</div>
				<?php
					for ($i=2018; $i <2022 ; $i++) { 
						$year[$i] = $i;
					}
				?>
				<div class="col-md-8">
					<?= Form::select('year', $year,!empty($_GET['year']) ? $_GET['year'] : null,['class' => 'form-control input-form', 'placeholder' => '--- Chọn Năm ---'])?>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group row">
				<div class="col-md-3 label-form">
					<?= Form::label('month', 'Tháng') ?>
				</div>
				<div class="col-md-8">
					<?php
						for ($i=1; $i <13 ; $i++) { 
							$month[$i] = $i;
						}
					?>
					<?= Form::select('month', $month,!empty($_GET['month']) ? $_GET['month'] : null,['class' => 'form-control input-form','placeholder' => '--- Chọn Tháng ---'])?>
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
								<th>Tiền Thưởng </th>
								<th>Ngày</th>
								<th>Ghi chú</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php if (count($thuongs) > 0): ?>
							@foreach ($thuongs as $thuong)
								<tr>
									<td>{{$thuong->nhansu->name}}</td>
									<td>{{number_format($thuong->tien_thuong)}}</td>
									<td>{{$thuong->date}}</td>
									<td>{{$thuong->note}}</td>
									<td>
										<!-- <a href="/admin/thuong/update/{{$thuong->id}}" ><i class="fas fa-pencil-alt"></i></a> -->
										<a href="/admin/thuong/delete/{{$thuong->id}}" ><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
							@endforeach
						<?php else: ?>
							<tr><td>No data!</td></tr>
						<?php endif ?>
						
							
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
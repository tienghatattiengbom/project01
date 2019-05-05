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
		{!! Form::open(['method' => 'GET', 'url' => '/admin/nhansu/index']) !!}
		<div class="col-xs-6">
			<div class="form-group row">
				<div class="col-md-3 label-form">
					<?= Form::label('name', 'Tên Nhân Viên') ?>
				</div>
				<div class="col-md-8">
					<?= Form::text('name' ,null,['class' => 'form-control input-form'])?>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group row">
				<div class="col-md-3 label-form">
					<?= Form::label('phong_ban', 'Phòng Ban') ?>
				</div>
				<div class="col-md-8">
					<?= Form::select('phong_ban', $phongban,null,['class' => 'form-control input-form', 'placeholder' => '--- Chọn Phòng ---'])?>
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
								<th>Địa Chỉ</th>
								<th>Số điện thoại</th>
								<th>Email</th>
								<th>Ngày sinh</th>
								<th>Giới Tính</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php if (count($nhansus) > 0): ?>
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
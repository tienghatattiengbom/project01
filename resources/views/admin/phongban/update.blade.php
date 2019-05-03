@extends('admin.layout.index')
@section('content')
<section class="content-header">
	<h1>
		Thêm mới phòng ban
	</h1>
</section>
<section class="content row">
	<div class="col-md-12" style="padding: 0px">
		<div class="box box-primary" style="padding-bottom: 10px">
			{!! Form::open(['method' => 'POST', 'url' => '/admin/phongban/update/'.$phongban->id]) !!}
				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ten_phongban', 'Tên Phòng Ban') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ten_phongban',$phongban->ten_phongban,['class' => 'form-control input-form','required'=>'required']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ma_phongban', 'Mã Phòng Ban') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ma_phongban',$phongban->ma_phongban,['class' => 'form-control input-form','required'=>'required']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('sdt_phongban', 'Số Điện Thoại Phòng Ban') ?>
					</div>
					<div class="col-md-8">
						<?= Form::input('number','sdt_phongban','0'.$phongban->sdt_phongban,['class' => 'form-control input-form','required'=>'required','maxlength' => '10']) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-offset-10 col-md-1">
						<?= Form::submit('Submit',['class' => 'btn btn-success'])?>
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</section>

@endsection
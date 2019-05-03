@extends('admin.layout.index')
@section('content')
<section class="content-header">
	<h1>
		Thêm mới sổ bảo hiểm
	</h1>
</section>
<section class="content row">
	<div class="col-md-12" style="padding: 0px">
		<div class="box box-primary" style="padding-bottom: 10px">
			{!! Form::open(['method' => 'POST', 'url' => '/admin/hopdong/create']) !!}
				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('nhansu_id', 'Nhân viên') ?>
					</div>
					<div class="col-md-8">
						<?= Form::select('nhansu_id', $nhanvien,null,['class' => 'form-control input-form'])?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ma_hd', 'Mã hợp đồng') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ma_hd',null,['class' => 'form-control input-form','required'=>'required']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ten_hd', 'Tên hợp đồng') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ten_hd',null,['class' => 'form-control input-form','required'=>'required']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ngay_ki', 'Ngày kí (YYYY-mm-dd)') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ngay_ki',null,['class' => 'form-control input-form','required'=>'required','id'=>'datemask']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ngay_het_han', 'Ngày hết hạn (YYYY-mm-dd)') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ngay_het_han',null,['class' => 'form-control input-form','required'=>'required','id'=>'datemask1']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('status', 'Trạng thái') ?>
					</div>
					<div class="col-md-8">
						<?= Form::select('status', [0=>'Không kích hoạt',1=>'Kích hoạt'],1,['class' => 'form-control input-form'])?>
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

@section('script')
    <script src="../../admin_asset/plugins/select2/select2.full.min.js"></script>
    <script src="../../admin_asset/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../admin_asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../admin_asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="../../admin_asset/plugins/datepicker/bootstrap-datepicker.js"></script>

    <script>
      $(function () {
          $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
          $("#datemask1").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
          $("[data-mask]").inputmask();
        });
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    </script>
@endsection
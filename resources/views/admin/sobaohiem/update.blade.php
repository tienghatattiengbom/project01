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
			{!! Form::open(['method' => 'POST', 'url' => '/admin/sobaohiem/update/'.$sobaohiem->id]) !!}
				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('nhansu_id', 'Nhân viên') ?>
					</div>
					<div class="col-md-8">
						<?= Form::select('nhansu_id',$nhanvien,$sobaohiem->nhansu_id,['class' => 'form-control input-form'])?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ma_sbh', 'Mã sổ bảo hiểm') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ma_sbh',$sobaohiem->ma_sbh,['class' => 'form-control input-form','required'=>'required']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ngay_cap', 'Ngày Cấp (YYYY-mm-dd)') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('ngay_cap',$sobaohiem->ngay_cap,['class' => 'form-control input-form','required'=>'required','id'=>'datemask']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('noi_cap', 'Nơi Cấp') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('noi_cap',$sobaohiem->noi_cap,['class' => 'form-control input-form','required'=>'required']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('note', 'Ghi chú') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('note',$sobaohiem->note,['class' => 'form-control input-form']) ?>
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
          $("[data-mask]").inputmask();
        });
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        });
    </script>
@endsection
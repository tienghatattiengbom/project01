@extends('admin.layout.index')
<link rel="stylesheet" href="../../admin_asset/plugins/timepicker/bootstrap-timepicker.min.css">
@section('content')

<section class="content-header">
	<h1>
	 Thông tin nhân viên
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Chấm Công</li>
	</ol>
</section>
<section class="content row">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4>Chi tiết nhân sự: {{$nhanvien->name}}</h4>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-3 title-row">
						Tên Nhân Sự
					</div>
					<div class="col-md-9 content-row">
						{{$nhanvien->name}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Địa Chỉ
					</div>
					<div class="col-md-9 content-row">
						{{$nhanvien->addrees}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Số Điện Thoại
					</div>
					<div class="col-md-9 content-row">
						{{$nhanvien->phone}}
					</div>
				</div>
				<div class="clearfix"></div>
				
				<div class="row">
					<div class="col-md-3 title-row">
						Email
					</div>
					<div class="col-md-9 content-row">
						{{$nhanvien->email}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Ngày Sinh
					</div>
					<div class="col-md-9 content-row">
						{{$nhanvien->birthday}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Giới tính
					</div>
					<div class="col-md-9 content-row">
						@if ($nhanvien->sex == "M" )
						    Nam
						@else
						    Nữ
						@endif
					</div>
				</div>
			</div>
		</div>
</section>




<section class="content-header">
	<h1>
	Quản Lý Thưởng
	</h1>
</section>
<section class="content row">
	<div class="col-md-12" style="padding: 0px">
		<div class="box box-primary" style="padding-bottom: 10px">
			<div class="box-header with-border">
				<h3 class="box-title">Chọn Nhân Viên Chấm Công</h3>
			</div>
			{!! Form::open(['method' => 'GET', 'url' => '/admin/thuong/keeping']) !!}
				{{ Form::hidden('nhansu_id', $nhanvien->id) }}
				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('date', 'Ngày Thưởng') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('date',date('d-m-Y',strtotime('now')),['class' => 'form-control input-form','required'=>'required',"id"=>"datepicker"]) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('tien_thuong', 'Tiền Thưởng') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('tien_thuong',null,['class' => 'form-control input-form','required'=>'required','onkeyup' => 'FormatNumber(this)']) ?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('note', 'Ghi Chú') ?>
					</div>
					<div class="col-md-8">
						<?= Form::textarea('note',null,['class' => 'form-control input-form']) ?>
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
<script src="../../admin_asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../admin_asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
	 $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
	 $(".timepicker").timepicker({
      showInputs: false
    });
</script>

<script>
      $(function () {
          $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
          $("[data-mask]").inputmask();
        });
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'dd/mm/yyyy'
        });
        function FormatNumber(obj) {
          var strvalue;
          if (eval(obj))
              strvalue = eval(obj).value;
          else
              strvalue = obj;
          var num;
          num = strvalue.toString().replace(/\$|\,/g, '');
          if (isNaN(num))
                  num = "";
          sign = (num == (num = Math.abs(num)));
          num = Math.floor(num * 100 + 0.50000000001);
          num = Math.floor(num / 100).toString();
          for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
              num = num.substring(0, num.length - (4 * i + 3)) + ',' +
              num.substring(num.length - (4 * i + 3));
              //return (((sign)?'':'-') + num);
          eval(obj).value = (((sign) ? '' : '-') + num);
      }
    </script>

@endsection
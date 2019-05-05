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
		Chấm Công
	</h1>
</section>
<section class="content row">

	<div class="col-md-offset-4 col-md-3">
		<a href="/admin/chamcong/checkin" class="btn btn-success btn-lg">
			check in
		</a>
	</div>
	<div class="col-md-3">
		<a href="/admin/chamcong/checkout" class="btn btn-danger btn-lg">
			check out
		</a>
	</div>
</section>

@endsection

@section('script')
<script src="../../admin_asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../admin_asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
	 $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
      });
	 $(".timepicker").timepicker({
      showInputs: false
    });
</script>
@endsection
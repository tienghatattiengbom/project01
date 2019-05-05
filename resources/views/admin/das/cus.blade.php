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
				<h4>Chi tiết nhân sự: {{$nhansu->name}}</h4>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-3 title-row">
						Tên Nhân Sự
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->name}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Địa Chỉ
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->addrees}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Số Điện Thoại
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->phone}}
					</div>
				</div>
				<div class="clearfix"></div>
				
				<div class="row">
					<div class="col-md-3 title-row">
						Email
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->email}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Ngày Sinh
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->birthday}}
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-3 title-row">
						Chứng Minh Thư
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->cmt}}
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-3 title-row">
						Trình Độ Học Vấn
					</div>
					<?php 
						$hoc_van = [
			              '1' => 'Phổ Thông',
			              '2' => 'Cao Đẳng',
			              '3' => 'Đại học',
			              '4' => 'Thạc Sĩ',
			              '5' => 'Tiến Sĩ',
			            ];
					?>
					<div class="col-md-9 content-row">
						{{$hoc_van[$nhansu->hoc_van]}}
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-3 title-row">
						Giới tính
					</div>
					<div class="col-md-9 content-row">
						@if ($nhansu->sex == "M" )
						    Nam
						@else
						    Nữ
						@endif
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-3 title-row">
						Phòng Ban
					</div>
					<div class="col-md-9 content-row">
						{{$nhansu->phongban->ten_phongban}}
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-3 title-row">
						Sổ Bảo Hiểm
					</div>
					<div class="col-md-9 content-row">
						<?php 
							$sobaohiem = $nhansu->sobaohiem->toArray();
							echo @$sobaohiem[0]['ma_sbh'];
						?>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-3 title-row">
						Số Hợp Đồng
					</div>
					<div class="col-md-9 content-row">
						<?php 
							$sohopdong = $nhansu->hopdong->toArray();
							echo @$sohopdong[0]['ma_hd'];
						?>
					</div>
				</div>
				<div class="clearfix"></div>
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
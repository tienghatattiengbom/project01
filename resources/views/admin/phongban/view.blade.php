@extends('admin.layout.index')
@section('content')
<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4>Chi tiết phòng ban: {{$phongban->ten_phongban}}</h4>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-3 title-row">
						Tên Phòng Ban
					</div>
					<div class="col-md-9 content-row">
						{{$phongban->ten_phongban}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Mã Phòng Ban
					</div>
					<div class="col-md-9 content-row">
						{{$phongban->ma_phongban}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Số Điện Thoại
					</div>
					<div class="col-md-9 content-row">
						{{$phongban->sdt_phongban}}
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
</section>
@endsection
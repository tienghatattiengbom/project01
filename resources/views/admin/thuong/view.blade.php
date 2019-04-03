@extends('admin.layout.index')

@section('content')
<section class="content-header">
  <h1>
    Quản Lý Thưởng
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Thưởng</li>
  </ol>
</section>

<section class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4>Thưởng số: {{$thuong->id}}</h4>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-3 title-row">
						Tên Nhân Sự
					</div>
					<div class="col-md-9 content-row">
						{{$thuong->nhansu->name}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Tiền Thưởng
					</div>
					<div class="col-md-9 content-row">
						{{$thuong->tien_thuong}}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 title-row">
						Ngày Thưởng
					</div>
					<div class="col-md-9 content-row">
						{{$thuong->date}}
					</div>
				</div>
				<div class="clearfix"></div>
				
				<div class="row">
					<div class="col-md-3 title-row">
						Ghi Chú
					</div>
					<div class="col-md-9 content-row">
						{{$thuong->note}}
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
</section>
@endsection
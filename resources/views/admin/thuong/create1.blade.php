@extends('admin.layout.index')

@section('content')
<section class="content-header">
	<h1>
	Quản Lý Chấm Công
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Chấm Công</li>
	</ol>
</section>
<section class="content row">
	<div class="col-md-12">
		<div class="box box-primary" style="padding-bottom: 10px">
			<div class="box-header with-border">
				<h3 class="box-title">Chọn Nhân Viên Chấm Công</h3>
			</div>
			{!! Form::open(['method' => 'GET', 'url' => '/admin/thuong/create']) !!}
				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('name', 'Tên Nhân Viên') ?>
					</div>
					<div class="col-md-8">
						<?= Form::text('name',null,['class' => 'typeahead form-control input-form','required'=>'required']) ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script>
	var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection
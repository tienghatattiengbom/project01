@extends('admin.layout.index')

@section('content')
<section class="content-header">
	<h1>
	Tính Lương
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
				<h3 class="box-title">Tính Lương</h3>
			</div>
			{!! Form::open(['method' => 'POST', 'url' => '/admin/luong/create']) !!}
				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('month', 'Tháng Tính Lương') ?>
					</div>
					<div class="col-md-8">
						<?php

							for ($i=1; $i <13 ; $i++) { 
								$option_month[$i] = 'Tháng '.$i;
							}
						?>
						<?= Form::select('month', $option_month,(int)date('m',strtotime('now')),['class' => 'form-control input-form'])?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('month', 'Năm Tính Lương') ?>
					</div>
					<div class="col-md-8">
						<?php 
							$year = date('Y',strtotime('now'));
							$flag = (-1);
							for ($i=0; $i <3 ; $i++) { 
								$option_year[$year + $flag] = 'Năm '. ($year + $flag);
								$flag++;
							}
						?>
						<?= Form::select('year', $option_year,date('Y',strtotime('now')),['class' => 'form-control input-form'])?>
					</div>
				</div>

				<div class="form-group row" style="margin-top: 20px">
					<div class="col-md-3 label-form">
						<?= Form::label('ngay_cong', 'Số ngày công trong tháng') ?>
					</div>
					<div class="col-md-8">
						<?= Form::number('ngay_cong',null,['class' => 'form-control input-form','required'=>'required']) ?>
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
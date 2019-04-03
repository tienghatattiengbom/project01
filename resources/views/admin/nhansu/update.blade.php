@extends('admin.layout.index')

@section('content')
<section class="content-header">
  <h1>
    Quản Lý Nhân Sự
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Nhân Sự</li>
  </ol>
</section>
<section class="content row">
    <div class="col-md-12">
      <div class="box box-primary" style="padding-bottom: 10px">
        <div class="box-header with-border">
          <h3 class="box-title">Thêm mới nhân sự</h3>
        </div>
        {!! Form::open(['method' => 'POST', 'url' => '/admin/nhansu/update/'.$nhansu->id]) !!}

        <div class="form-group row" style="margin-top: 20px">
          <div class="col-md-3 label-form">
            <?= Form::label('name', 'Tên Nhân Viên') ?>
          </div>
          <div class="col-md-8">
            <?= Form::text('name',$nhansu->name,['class' => 'form-control input-form','required'=>'required']) ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('addrees', 'Địa Chỉ') ?>
          </div>
          <div class="col-md-8">
            <?= Form::text('addrees',$nhansu->addrees,['class' => 'form-control input-form','required'=>'required']) ?>
          </div>
        </div>
        
        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('phone', 'Số Điện Thoại') ?>
          </div>
           <div class="col-md-8">
            <?php if ($errors->has("phone")): ?>
              <?= Form::text('phone',$nhansu->phone,['class' => 'form-control input-form has-error','required'=>'required',]); ?>
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            <?php else: ?>
              <?= Form::text('phone',$nhansu->phone,['class' => 'form-control input-form','required'=>'required',]); ?>
            <?php endif ?>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('email', 'Email') ?>
          </div>
          <div class="col-md-8">
            <?php if ($errors->has("email")): ?>
              <?= Form::email('email',$nhansu->email,['class' => 'form-control input-form has-error','required'=>'required']) ?>
              <span class="text-danger">{{ $errors->first('email') }}</span>
            <?php else: ?>
              <?= Form::email('email',$nhansu->email,['class' => 'form-control input-form','required'=>'required']) ?>
            <?php endif ?>
            
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('birthday', 'Ngày sinh') ?>
          </div>
          <div class="col-md-8">
            <?= Form::text('birthday',date('d-m-Y',strtotime($nhansu->birthday)),['class' => 'form-control input-form ','data-inputmask'=>"'alias': 'dd-mm-yyyy'", 'data-mask'=>'']) ?>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('sex', 'Giới tính') ?>
          </div>
          <div class="col-md-8">
            <?= Form::select('sex', ['M' => 'Nam', 'F' => 'Nữ'],$nhansu->sex,['class' => 'form-control input-form'])?>
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
    <script src="/admin_asset/plugins/select2/select2.full.min.js"></script>
    <script src="/admin_asset/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/admin_asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/admin_asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <script>
      $(function () {
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("[data-mask]").inputmask();
      });
    </script>
@endsection
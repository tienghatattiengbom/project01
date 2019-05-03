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

        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('salary_basic', 'Lương cơ bản') ?>
          </div>
          <div class="col-md-8">
            <?= Form::text('salary_basic' ,$nhansu->salary_basic,['class' => 'form-control input-form','onkeyup' => 'FormatNumber(this)'])?>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-3 label-form">
            <?= Form::label('phongban_id', 'Phòng ban') ?>
          </div>
          <div class="col-md-8">
            <?= Form::select('phongban_id', $phongban,$nhansu->phongban_id,['class' => 'form-control input-form'])?>
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
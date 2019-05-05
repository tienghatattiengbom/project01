@extends('admin.layout.index')

@section('content')


<section class="content-header">
	<h1>
		Quản Lý User
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">User</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box-button">
		<a href="/admin/user/create" class="btn btn-success add-employees"> <i class="fas fa-user-plus"></i> add</a>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>User</th>
								<th>Email</th>
								<th>Quyền</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($users as $user)
						    <tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
									@if($user->rule == 2)
										Nhân Viên
									@else
										Admin
									@endif
								</td>
								<td>
									<a href="/admin/user/update/{{$user->id}}" ><i class="fas fa-pencil-alt"></i></a>
									<a href="/admin/user/delete/{{$user->id}}" ><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						@endforeach
							
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@endsection
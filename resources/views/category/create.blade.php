@extends('admintemplate')
@section('content')
<div class="col-lg-10 col-md-10">
		<div class="card my-5 p-3">
			<h4>Add Category Name Here!</h4>
			<hr>
			<form method="post" action="{{route('admin.category.store')}}">
				@csrf
				<div class="form-group">
					<label>Category Name:</label>
					<input type="text" name="name" class="form-control">
				</div>

				@foreach($errors->all() as $err)
				<li class="text-danger">{{$err}}</li>
				@endforeach
				
				<div class="form-group">
					<input type="submit" name="btn" class="btn btn-primary" value="Save">
				</div>
			</form>
		</div>
	</div>
@endsection
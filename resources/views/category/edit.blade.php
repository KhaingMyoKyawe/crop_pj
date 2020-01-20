@extends('admintemplate')
@section('content')
	<div class="col-md-8">
		<div class="card my-5 p-3">
			<h4>Update Category Name Here!</h4>
			<hr>
			<form method="post" action="{{route('admin.category.update',$category->id)}}">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label>Category Name:</label>
					<input type="text" name="name" class="form-control" value="{{$category->name}}">
				</div>

				@foreach($errors->all() as $err)
				<li class="text-danger">{{$err}}</li>
				@endforeach
				
				<div class="form-group">
					<input type="submit" name="btn" class="btn btn-primary" value="Update">
				</div>
			</form>
		</div>
	</div>
@endsection
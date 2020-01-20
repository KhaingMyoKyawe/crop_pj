@extends('admintemplate')
@section('content')

<div class="col-md-8">
	<div class="card my-5 p-3">
		<h4>Edit Subcategory Here!</h4>
		<hr>
	<!-- ********* -->
		<ul>
		@foreach($errors->all() as $err)
			<li class="text-danger">{{$err}}</li>
		@endforeach
	    </ul>
		<form method="post" action="{{route('admin.subcategory.update',$subcategory->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Subcategory Name:</label>
				<input type="text" name="name" class="form-control" value="{{$subcategory->name}}">
			</div>

			<div class="form-group">
				<label>Category:</label>
				<select name="categoryid" class="form-control">
					<option value="">
						Choose Category
					</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}"
						@if($category->id == $subcategory->categoryid)
						{{'selected'}}
						@endif
						>{{$category->name}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<input type="submit" name="btnok" value="Update" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection
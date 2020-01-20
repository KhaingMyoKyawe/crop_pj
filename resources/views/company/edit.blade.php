@extends('maintemplate')
@section('content')

<div class="col-md-8">
	<div class="card my-5 p-3">
		 
      <center>
        <h2><span class="color-b">Edit</span>Post<span>He</span>re!
          
        </h2>
      </center>
   
		<hr>

		<form method="post" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data">
			@method('PUT')

			<div class="form-group">
				<label>Post Title</label>

				<input type="text" name="title" class="form-control" value="{{$company->title}}">
			</div>
			@csrf

			<div class="form-group">
				<label>Category:</label>
				<select name="type" id="category" class="form-control">
					<option value="">Choose Category:</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}" 
						@if($category->id==$company->categoryid){{'selected'}}
						@endif>
						{{$category->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Sub Category:</label>
				<select name="subtype" class="subtype form-control">
					<option value="">Choose Sub Category</option>
					@foreach($subcategories as $subcategory)
					<option value="{{$subcategory->id}}" 
						@if($subcategory->id==$company->subcategoryid){{'selected'}}
						@endif>
						{{$subcategory->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Min Amount:</label>
				<input type="number" name="minamount" class="form-control" value="{{$company->minamount}}">
			</div>

			<div class="form-group">
				<label>Min Price</label>
				<input type="number" name="minprice" class="form-control" value="{{$company->minprice}}">
			</div>

			<div class="form-group">
				<label>Max Amount:</label>
				<input type="number" name="maxamount" class="form-control" value="{{$company->maxamount}}">
			</div>

			<div class="form-group">
				<label>Max Price</label>
				<input type="number" name="maxprice" class="form-control" value="{{$company->maxprice}}">
			</div>

			<div class="form-group">
				<label>Image:</label>
				<input type="file" name="image" class="form-control-file">
				<img src="{{asset($company->image)}}" width="100">
				<input type="hidden" name="oldimg" value="{{$company->image}}">
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control">
					{{$company->description}}
				</textarea>
				
			</div>

			<div class="form-group">
				<input type="submit" name="btnok" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>
</div>
@endsection

@section('script')

<script>
	$('#category').change(function(){
		var cat_id = $(this).val();
		console.log(cat_id);
		var div = $(this).parent();
		var op=" ";
		$.ajax({
			type:'get',
			url:'{!!URL::to('getCategorysedit')!!}',
			data:{'id':cat_id},
			success:function(data){
					console.log('success');
					console.log(data);
					op+='<option value="0" selected disabled>Choose category</option>';
					for(var i=0;i<data.length;i++){
						op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
					}
					$('.subtype').html(" ");
					$('.subtype').append(op);
			},
			error:function(){

			}
		})
	});
</script>
@endsection
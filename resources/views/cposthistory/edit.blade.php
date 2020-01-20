@extends('maintemplate')
@section('content')

<div class="col-md-8 mb-5" style="background-color: #f2f3f4">
	<div class="card my-5 p-3" style="background-color: #f2f3f4">
		 <center>
        <h2><span class="color-b">Edit</span>Post<span>He</span>re!
          
        </h2>
      </center>
		<hr>
	<!-- ********* -->
		<ul>
		@foreach($errors->all() as $err)
			<li class="text-danger">{{$err}}</li>
		@endforeach
	    </ul>
		<form method="post" action="{{route('cposthistory.update',$cpost->id)}}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Post title:</label>
				<input type="text" name="title" class="form-control" value="{{$cpost->title}}">
			</div>

			<div class="form-group">
				<label>Description:</label>
				<textarea name="body" class="form-control">{{$cpost->description}}</textarea>
			</div>

			<div class="form-group">
				<label>Image:</label>
				<input type="file" name="image" class="form-control-file">
				<img src="{{asset($cpost->image)}}" width="100">
				<input type="hidden" name="oldimg" value="{{$cpost->image}}">
			</div>

			<div class="form-group">
				<label>Category:</label>
				<select name="category"  id="category" class="form-control">
					<option value="">
						Choose Category
					</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}"
						@if($category->id==$cpost->categoryid)
						{{'selected'}}
						@endif
						>{{$category->name}}
					</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
						<label>Sub Category:</label>
						<select name="subtype" class="form-control subtype">
							<option value="">
							Choose Sub Category
							</option>
							@foreach($subcategories as $subcategory)
							<option value="{{$subcategory->id}}"
							 @if($subcategory->id == $cpost->subcategoryid){{'selected'}}@endif
							 >{{$subcategory->name}}
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

@section('script')

<script>
	$('#category').change(function(){
		var cat_id = $(this).val();
		console.log(cat_id);
		var div = $(this).parent();
		var op=" ";
		$.ajax({
			type:'get',
			url:'{!!URL::to('getCategorycedit')!!}',
			data:{'id':cat_id},
			success:function(data){
					console.log('success');
					console.log(data);
					op+='<option value="0" selected>Choose category</option>';
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
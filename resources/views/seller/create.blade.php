@extends('maintemplate')
@section('content')
<section>
	<div class="col-md-12 align-items-center mt-5">
	<div class="card my-5 p-3"> 
		<h4><span class="color-b">Up</span>lo<span class="color-b">ad</span> Po<span class="color-b">st</span> He<span class="color-b">re!</span></h4>
		<hr>
		<form method="post" action="{{route('seller.store')}}" enctype="multipart/form-data" style="background-color: #f2f3f4">
			@csrf
			<div class="container">
	         <div class="row">
					<div class="col-lg-12 form-group">
				<label>Post Title:</label>

				<input type="text" name="title" class="form-control" required="required">
			</div>
			</div>

			<div class="row">
			  	<div class="col-lg-6 form-group">
					<label>Category:</label>
					<select name="type" id="category" class="form-control">
						<option value="">
							Choose Category
						</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}" data-id="{{$category->id}}">
							{{$category->name}}
						</option>
						@endforeach
					</select>
				</div>
			    <div class="col-lg-6 form-group">
					<label>Sub Category:</label>
					<select name="subtype" class="form-control subtype">
							
					</select>
				</div>
			</div>
		    

			
				
			
		<div class="row">
			<div class="col-lg-6 form-group">
				<label>Price:</label>
				<input type="text" name="price" class="form-control" required="required">
			</div>
			<div class="col-lg-6 form-group">
				<label>Quantity</label>
				<input type="number" name="qty" class="form-control" required="required">
			</div>
		</div>

		
			
		<div class="row">
			<div class="col-lg-6 form-group">
				<label>Image:</label>
				<input type="file" name="image" class="form-control-file">
			</div>
			<div class="col-lg-6 form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" required="required"></textarea>
				
			</div>
		</div>

		
			


		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="submit" name="btnok" class="btn btn-success" value="Upload">
			</div>
		</div>
	</div>
		</form>
	</div>
	</div>
</section>
	
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
			url:'{!!URL::to('getsubCategory')!!}',
			data:{'id':cat_id},
			success:function(data){
					console.log('success');
					console.log(data);
					op+='<option value="0" selected disabled>Choose subcategory</option>';
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
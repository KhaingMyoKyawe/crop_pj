@extends('maintemplate')

@section('content')
<section class="login-wrapper features">
	<div class="container">
    	<div class="col-md-12 col-sm-12 col-md-offset-3 col-sm-offset-2 features-content">
        	
        		
        		<form method="post" action="{{route('profile.update',$user->userinfo->id)}}" enctype="multipart/form-data">
				<!-- <input name="_method" type="hidden" value="PUT"> -->
				<i class="fas fa-2x text-dark">Edit Profile</i><hr>
					@csrf
					@method('PATCH')


				<div class="form-group">
			    	<label for="formGroupExampleInput2" class="fas text-dark">Name</label>
			    	<input type="text" class="fas form-control" name="name" id="formGroupExampleInput2" value="{{$user->name}}">
			    	@if($errors->has('name'))
			    	<li class="text-danger">{{$errors->first('name')}}</li>
			    	@endif
			  	</div>
				
			  	<div class="form-group">
			     <label for="formGroupExampleInput2" class="fas">Email</label>
			    	<input type="email" class="fas form-control" name="email" id="formGroupExampleInput2" readonly="" value="{{$user->email}}">
			  	</div>

			  	<div class="form-group">
							
					<img src="{{$user->userinfo->image}}" class="rounded-circle" width="100" height="100">
					<input type="hidden" name="oldimg" value="{{$user->userinfo->image}}" >
					
					<input type="file" name="image" class="form-control-file">
						
				</div>

			  	<div class="form-group">
			  		
			    	<input type="submit" class="btn btn-info" value="Update">
			    	
			  	</div>

				</form>
			
		</div>
	</div>
</section>
@endsection
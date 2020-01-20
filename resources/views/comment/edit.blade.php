@extends('maintemplate')
@section('content')
<div class="col-md-8">
	<div class="card">
		<h4>Update Comment Here</h4>
		<hr>
		<form action="{{route('comment.update',$comment->id)}}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label>Update Comment</label>
				<textarea name="body" class="form-control">
					{{$comment->body}}
				</textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="btnok" value="Update" class="btn btn-info">
			</div>
		</form>
	</div>
</div>
@endsection
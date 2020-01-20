@extends('admintemplate')

@section('content')


<section class="about-us-area">
      <div class="container">
        <div class="row heading">
          <h2 class="fas fa-2x text-primary">Comments List</h2>
          
        </div><hr>
        @foreach($comments as $comment)
        <div class="comments ">
          
          <div class="comment-list">
            
            <div class="row">
              
              <div class="col-md-8 col-sm-8">
                <div class="comment-content">
                  <h4 class="fas fa-2x">
                    {{ $comment->uname}}
                  </h4>

                  <p>{{$comment->body}}
                  
                  </p>
                </div>
                 <form action="{{route('admin.bcomment.destroy',$comment->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <input type="submit" name="btn" value="Delete" class="btn btn-danger">
                  </form>
              </div>
            </div>
            <hr>
          </div>
          
        </div>
        @endforeach   
        {{$comments->links()}}
      </div>
</section>
    
@endsection
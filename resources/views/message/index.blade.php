@extends('admintemplate')

@section('content')


<section class="about-us-area">
      <div class="container">
        <div class="row heading">
          <h2 class="fas fa-2x text-primary">Suggestions Lists</h2>
          
        </div><hr>
        @foreach($messages as $message)
        <div class="messages ">
          
          <div class="message-list">
            
            <div class="row">
              
              <div class="col-md-8 col-sm-8">
                <div class="message-content">
                  <h3 class="fas fa-2x">
                    {{ $message->name}}
                  </h3>
                   <p>{{$message->subject}}</p>

                  <p>{{$message->message}}
                  
                  </p>

                </div>
                 <form action="{{route('admin.message.destroy',$message->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <input type="submit" name="btn" value="Delete" class="btn btn-danger">
                  </form>
              </div>
            
              

            </div><hr>

          </div>
          
        </div>
        @endforeach 
        {{$messages->links()}}  
      </div>
</section>
    
@endsection
@extends('admintemplate')

@section('content')


<section class="about-us-area">
      <div class="container">
        <div class="row heading">
          <h2 class="fas fa-2x text-primary">Seller Posts</h2>
          
        </div><hr>
        @foreach($sellers as $seller)
        <div class="sellers ">
          
          <div class="seller-list">
            
            <div class="row">
              
              <div class="col-md-2 col-sm-2">
                <div class="seller-logo">
                  <img src="{{asset($seller->image)}}">
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="seller-content">
                  <h3 class="fas fa-2x">
                    {{ $seller->title}}
                  </h3>

                  <p>{{$seller->description}}
                  
                  </p>
                </div>
                 <form action="{{route('admin.sellerpost.destroy',$seller->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
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
        {{$sellers->links()}}
      </div>
</section>
    
@endsection
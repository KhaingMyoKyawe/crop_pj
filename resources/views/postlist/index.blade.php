@extends('admintemplate')

@section('content')


<section class="about-us-area">
      <div class="container">
        <div class="row heading">
          <h2 class="fas fa-2x text-primary">Buyer Posts</h2>
          
        </div><hr>
        @foreach($companies as $company)
        <div class="companies ">
          
          <div class="company-list">
            
            <div class="row">
              
              <div class="col-md-2 col-sm-2">
                <div class="company-logo">
                  <img src="{{asset($company->image)}}">
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="company-content">
                  <h3 class="fas fa-2x">
                    {{ $company->title}}
                  </h3>

                  <p>{{$company->description}}
                  
                  </p>
                </div>
                 <form action="{{route('admin.postlist.destroy',$company->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <input type="submit" name="btn" value="Delete" class="btn btn-danger">
                  </form>
              </div>
            
              

            </div><hr>

          </div>
          
        </div>
        @endforeach 
        {{$companies->links()}}  
      </div>
</section>
    
@endsection
@extends('maintemplate')
@section('content')
@foreach($cposts as $cpost)
<div class="container mt-5">
   <div class="row">
    <div class="col mb-5">
      <center>
        <h2><span class="color-b">POS</span>T DE<span class="color-b">AILS</span>
          
        </h2>
      </center>
    </div>
  </div>

  <div class="row">

    <div class="col-md-6">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{asset($cpost->image)}}" alt="" class="img-a img-fluid" style="width: 600px;height: 350px">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">{{$cpost->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$cpost->description}}</span>
                  </div>
                 
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                       <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$cpost->uname}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$cpost->created_at}}
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      <div class="col-lg-6">
  
         
         <div class="row mb-3">
                <div class="col-6">
                  <ul>
                   
                      <li> <span>Category:</span></li>
                      <li> <span>Sub Category:</span></li>
                      <li> <span>MinAmount:</span></li>
                      <li> <span>MinPrice:</span></li>
                      <li> <span>MaxAmount:</span></li>
                      <li> <span>MaxPrice:</span></li>
                      
                  </ul>

                </div>
                <div class="col-6">

                  <ul>
                   
                      <span>{{$cpost->cname}}</span><br>
                      <span>{{$cpost->scname}}</span><br>
                      <span>{{$cpost->minamount}}</span><br>
                      <span>{{$cpost->minprice}}</span><br>
                      <span>{{$cpost->maxamount}}</span><br>
                      <span>{{$cpost->maxprice}}</span><br>
                     
                  </ul>
                </div>
          </div>
          
          <div class="row">
            <div class="col">
              <a href="{{route('cposthistory.edit',$cpost->id)}}" class="btn btn-success" style="background-color: darkgreen;">Edit</a>
       
              <form method="post" action="{{route('cposthistory.destroy',$cpost->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <input type="submit" name="btn" value="Delete" class="btn btn-danger">
              </form>
            </div>
          </div>

     

         </div>

  </div>
</div>
@endforeach
@endsection
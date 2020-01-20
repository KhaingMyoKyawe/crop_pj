@extends('maintemplate')
@section('content')
@foreach($sposts as $spost)
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
              <img src="{{asset($spost->image)}}" alt="" class="img-a img-fluid" style="width: 600px;height: 350px">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">{{$spost->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$spost->description}}</span>
                  </div>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                       <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$spost->uname}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$spost->created_at}}
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
                      <li> <span>Price:</span></li>
                      <li> <span>Quantity:</span></li>
                     
                  </ul>
                </div>
                <div class="col-6">

                  <ul>
                    
                      <span>{{$spost->cname}}</span><br>
                      <span>{{$spost->scname}}</span><br>
                      <span>{{$spost->price}}</span><br>
                      <span>{{$spost->quantity}}</span><br>
                      
                  </ul>
                </div>
          </div>
     
      
      
     
      <div class="row ">
        <div class="col">
          <a href="{{route('sposthistory.edit',$spost->id)}}" class="btn btn-success" style="background-color: darkgreen;">Edit</a>
       
            <form method="post" action="{{route('sposthistory.destroy',$spost->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
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


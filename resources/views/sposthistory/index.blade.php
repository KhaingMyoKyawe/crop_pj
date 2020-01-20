@extends('maintemplate')

@section('content')



 <section class="property-grid grid mt-5">
    <div class="container">
      <div class="row">
        <div class="col mb-5">
          <center>
            <h2><span class="color-b">YOUR</span> HIST<span class="color-b">ORY</span></h2>
          </center>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="1">Categories</option>
              </select>
            </form>
          </div>
        </div> -->
        @foreach($sposts as $spost)
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
                  <a href="{{route('sposthistory.show',$spost->id)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$spost->name}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$spost->created_at}}
                      </span>
                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{$sposts->links()}}
     
      </div>
      <!--  -->
    </div>
  </section>
@endsection
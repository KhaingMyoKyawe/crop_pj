@extends('maintemplate')
@section('content') 
  <section class="property-grid grid mt-5">
    <div class="container">
         <div class="row mb-5">
        <div class="col">
          <center>
            <h2 class="navbar-brand text-brand">
              <span class="color-b">B</span>UY<span class="color-b">ER</span> PO<span class="color-b">S</span>TS
            </h2>
          </center>
        </div>
      </div>
     
        <div class="row">

        @foreach($ddcompanies as $ddcompany)
        <div class="col-md-6">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{asset($ddcompany->image)}}" alt="" class="img-a img-fluid" style="width: 600px;height: 350px">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">{{$ddcompany->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$ddcompany->description}}</span>
                  </div>
                  <a href="{{route('company.show',$ddcompany->id)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$ddcompany->name}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$ddcompany->created_at}}
                      </span>
                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
         {{$ddcompanies->links()}}
     
      </div>
    </div>
  </section>


   <section class="property-grid grid mt-5">
    <div class="container">
        <div class="row mb-5">
        <div class="col">
          <center>
            <h2 class="navbar-brand text-brand">
              <span class="color-b">SE</span>LL<span class="color-b">ER</span> PO<span class="color-b">S</span>TS
            </h2>
          </center>
        </div>
      </div>
      <div class="row">
        @foreach($ddsellers as $ddseller)
        <div class="col-md-6">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{asset($ddseller->image)}}" alt="" class="img-a img-fluid" style="width: 600px;height: 350px">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">{{$ddseller->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$ddseller->description}}</span>
                  </div>
                  <a href="{{route('seller.show',$ddseller->id)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                       <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$ddseller->name}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$ddseller->created_at}}
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
         {{$ddsellers->links()}}
     
      </div>
    </div>
  </section> 
  @endsection




  



  
    
 
@extends('maintemplate')

@section('content')
  <section class="property-grid grid mt-5">
    <div class="container">
      <div class="row">
        <div class="col mb-5">
          <center>
            <h2><span class="color-b">YOUR</span>HIST<span class="color-b">ORY</span></h2>
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
        @foreach($cposts as $cpost)
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
                  <a href="{{route('cposthistory.show',$cpost->id)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$cpost->name}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$cpost->created_at}}
                      </span>
                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
         {{$cposts->links()}}
     
      </div>
     <!--  <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div> -->
    </div>
  </section>

@endsection
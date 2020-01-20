@extends('maintemplate')
@section('content')
@foreach($companies as $company)
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
              <img src="{{asset($company->image)}}" alt="" class="img-a img-fluid" style="width: 600px;height: 350px">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">{{$company->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$company->description}}</span>
                  </div>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                       <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$company->uname}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$company->created_at}}
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
                      <li> <span>Subcategory:</span></li>
                      <li> <span>MinAmount:</span></li>
                      <li> <span>MinPrice:</span></li>
                      <li> <span>MaxAmount:</span></li>
                      <li> <span>MaxPrice:</span></li>
                     
                  </ul>

                </div>
                <div class="col-6">

                  <ul>
                      
                      <span>{{$company->cname}}</span><br>
                      <span>{{$company->scname}}</span><br>
                      <span>{{$company->minamount}}</span><br>
                      <span>{{$company->minprice}}</span><br>
                      <span>{{$company->maxamount}}</span><br>
                      <span>{{$company->maxprice}}</span><br>
                      
                  </ul>
                </div>
          </div>
        @if(Auth::check() && Auth::user()->id == $company->userid)
          <div class="row">
            <div class="col">
              <a href="{{route('company.edit',$company->id)}}" class="btn btn-success" style="background-color: darkgreen;">Edit</a>

              <form method="post" action="{{route('company.destroy',$company->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <input type="submit" name="btn" value="Delete" class="btn btn-danger">
              </form>

            </div>
          </div>
        @endif
        <img class="img-fluid rounded" src="{{asset('$company->image')}}" alt="">
         </div>
       </div>
   
    </div>
 </div>

      @if(Auth::check() && Auth::user()->role == 'admin')

      @else
        <div class="card my-4">
          <h5 class="card-header text-dark" style="background-color: #f2f3f4;">Leave a Comment:</h5>
          <div class="card-body">
              @csrf
              <input type="hidden" name="company_id" value="{{$company->id}}" id="seller_id">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
              </div>
              <button type="submit" class="btn btn-primary submit" style="background-color: green;">Submit</button>
            
          </div>
        </div>
      @endif

         <div id="showcomment" class="ml-5"></div>

   
  </div>


</div>


@endforeach
@endsection



@section('script')
<script type="text/javascript">
  $(document).ready(function() {
  //ajax set up here
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var seller_id=$('#seller_id').val();
    getComments(seller_id);

    $('.submit').click(function(){
      //alert('ok');
      var comment=$('#comment').val();
    //alert(seller_id+comment);
    
      $.post('/comment',{seller_id:seller_id,comment:comment},function(response){
        console.log(response);
        $('#comment').val('');
        getComments(seller_id);
      });
    })

    $('#showcomment').on('click','.edit',function(e){
      e.preventDefault();
      $(this).parents('.comment').find('.editform').removeClass('d-none');
    });

    $('#showcomment').on('click','.update',function(argument){
      var commenttxt=$(this).parents('.comment').find('.commenttxt').val();
      var seller_id=$(this).parents('.comment').find('.sellerid').val();
      var comment_id=$(this).parents('.comment').find('.commentid').val();
      //alert(commenttxt+seller_id+comment_id);
      $.post("{{route('comment_update')}}",{seller_id:seller_id,comment:commenttxt,comment_id:comment_id},function(response){
        console.log(response);
        getComments(seller_id);
      })
    })

    
    $('#showcomment').on('click','.delete',function(argument){
     // var comment_id=$(this).data('commentid');
      var comment_id=$(this).parents('.comment').find('.commentid').val();
      var seller_id=$(this).parents('.comment').find('.sellerid').val();

     var ans = confirm("Are you sure to delete?");
     if(ans){
      $.post("{{route('comment_delete')}}",{comment_id:comment_id,seller_id:seller_id},function(response){
        console.log(response);
        getComments(seller_id);

      })
  }
    })


   function getComments(seller_id){
       $.post("{{route('getcomments')}}",{seller_id:seller_id},function (response){
        console.log(response);
        var html='';
        var authid = response.authid;

        $.each(response.comments,function(i,v){
          console.log(i,v);
          var image=v.userimage;
          var name=v.uname;
          console.log(name);
          var comment=v.body;
          var commentid=v.id;
          var user_id=v.userid;
          var created_at=v.created_at;


          html+='<div class="comment"><img class="rounded-circle" src="'+image+'" width="50">'+
          '<p>'+name+'</p>'+
          '<p>'+comment+'</p>'+
          '<span class="float-right small mr-5">'+created_at+'</span>';

          if(user_id == authid){ 

          html+='<div class="d-none editform"><input type="text" value="'+comment+'" class="commenttxt form-control">'+
            '<input type="hidden" value="'+seller_id+'" class="form-control sellerid">'+
            '<input type="hidden" value="'+commentid+'" class="form-control commentid">'+
            '<button class="update btn btn-primary btn-sm">update</button>'+
            '</div>'+
            '<a href="#" class="edit btn btn-success btn-sm mr-1">edit</a>'+
            '<button type="submit" class="delete btn btn-danger btn-sm">delete</button></div>';
          }
        })
        $('#showcomment').html(html);
       })
     }
     
    
})
</script>
@endsection
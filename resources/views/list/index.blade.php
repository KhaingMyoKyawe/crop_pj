    @extends('admintemplate')

    @section('content')
    <div class="container my-5">
      <div class="row">
      <div class="col-lg-12 col-md-12">
        
          <h1 class="my-4">All Register Lists</h1>

          <!-- <div class="d-flex align-items-center">
          <a href="#" class="btn btn-primary ml-auto">Add</a>
          </div> -->

        <!-- Blog Post -->

        <table class="table table-hover" cellpadding="10">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th colspan="2">Action</th>
            </tr>
          </tfoot>
          <tbody>
           @php
             $i =1;
            @endphp
            @foreach($lists as $list)
              <tr>
                <td>{{$i}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->email}}</td>
                <td>{{$list->role}}</td>
                <td>
                      <button class="confirm btn btn-primary btn-sm" data-id="{{$list->user_id}}" data-userinfoid ="{{$list->id}}" data-image="{{$list->image}}" data-name="{{$list->name}}" data-email="{{$list->email}}" data-password="{{$list->password}}"  data-role="{{$list->role}}" data-phone="{{$list->phno}}" data-timelength="{{$list->timelength}}" data-address="{{ $list->address }}">Accept</button>
            
                    <form method="post" action="{{route('admin.list.destroy',$list->user_id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                      @csrf
                      @method('DELETE')
                      <input type="submit" name="btn" class="btn btn-danger btn-sm" value="Reject">
                    </form>
                 

                </td>
                @php
                $i++;
                @endphp
              </tr>
             
            @endforeach


          </tbody>
        </table>


      </div>
      </div>
    </div>


    <div class="container my-5">
      <div class="row">
      <div class="col-lg-12 col-md-12">
        
          <h1 class="my-4">All Recorded Lists</h1>

        <!-- Blog Post -->

        <table class="table table-hover" cellpadding="10">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phno</th>
              <th>Address</th>
              <th>TimeLength</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phno</th>
              <th>Address</th>
              <th>TimeLength</th>
              <th colspan="2">Action</th>
            </tr>
          </tfoot>
          <tbody id="recordbody">

          </tbody>
        </table>
        

      </div>
      </div>
    </div>
    @endsection
    @section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });
    var name = $(this).data('name');
    records(name);
     
    $('.confirm').click(function(){
      var userid = $(this).data('id');
      var userinfoid = $(this).data('userinfoid');
      var name = $(this).data('name');
      var email = $(this).data('email');
      var password = $(this).data('password');
      var role = $(this).data('role');
      var phno = $(this).data('phone');
      var timelength = $(this).data('timelength');
      var address = $(this).data('address');
      var image = $(this).data('image');

      //alert(userid + name + role + timelength + userinfoid + email );

      $.post("{{route('admin.recordlist.store')}}",{userid:userid,userinfoid:userinfoid,name:name,email:email,password:password,role:role, phno:phno, timelength:timelength, address:address, image:image},function(response){
        //console.log(response);
        location.reload();
        $(this).data('');
         records(name);
      })
      
    })

    function records(name) {
        $.post("{{route('records')}}",{name:name},function(response){
        //console.log(response);

      var recorded = '';
       var j=1;
        $.each(response,function(i,v){
          // console.log(i,v);
          var id = v.id;
          var name = v.name;
          //var user_id = v.user_id;
          //var image = v.image;
          var phno = v.phno;
          var address = v.address;
          var timelength = v.timelength;

          recorded +=`<tr><td>${j}</td><td>${name}</td><td>${phno}</td><td>${address}</td><td>${timelength}</td><td><button class="btn btn-danger btn-sm delete" data-id="${id}" onsubmit="return confirm('Are you sure?');">Remove</button></td><td><input type="hidden" value="" ></td></tr>`;
         j++;
        });
        $('#recordbody').html(recorded);
      })
    }
    $("#recordbody").on('click','.delete',function(argument){
      //alert('ok');
      var record_id = $(this).data('id');
      //alert(record_id);
      $.post("{{route('recordlist_destroy')}}",{record_id:record_id},function(response){
        //console.log(response);
        //getComments(post_id);
           location.reload();
        records(name);
      })
   
    })
  })
</script>
@endsection

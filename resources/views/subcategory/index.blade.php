    @extends('admintemplate')

    @section('content')
    <div class="container my-5">
      <div class="row">
      <div class="col-lg-12 col-md-12">
        
          <h1 class="my-4">All Subcategories</h1>
        
        <div class="d-flex align-items-center">
          <a href="{{route('admin.subcategory.create')}}" class="btn btn-primary ml-auto">Add</a>
        </div>
        <!-- Blog Post -->

        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th colspan="2">Category Name</th>
              <th colspan="3">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
             $i =1;
            @endphp
            @foreach($subcategories as $subcategory)
              <tr>
                <td>{{$i}}</td>
                <td>{{$subcategory->name}}</td>
                <td colspan="2">{{$subcategory->cname}}</td>
                <td><a href="{{route('admin.subcategory.edit',$subcategory->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <form method="post" action="{{route('admin.subcategory.destroy',$subcategory->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                      @csrf
                      @method('DELETE')
                      <input type="submit" name="btn" class="btn btn-danger btn-sm" value="Delete">
                    </form>
                </td>
                @php
                $i++;
                @endphp
              </tr>
            @endforeach

          </tbody>
        </table>
          {{$subcategories->links()}}

      </div>
      </div>
    </div>
    @endsection
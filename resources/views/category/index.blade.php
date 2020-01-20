    @extends('admintemplate')

    @section('content')
    <div class="container my-5">
      <div class="row">
      <div class="col-lg-8 col-md-8">
        
          <h1 class="my-4">All Categories</h1>
        
        <div class="d-flex align-items-center">
          <a href="{{route('admin.category.create')}}" class="btn btn-primary ml-auto">Add</a>
        </div>
        <!-- Blog Post -->

        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
             
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
             $i =1;
            @endphp
            @foreach($categories as $category)
              <tr>
                <td>{{$i}}</td>
                <td>{{$category->name}}</td>
               
                <td><a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <form method="post" action="{{route('admin.category.destroy',$category->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
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
         {{$categories->links()}}

      </div>
      </div>
    </div>
    @endsection
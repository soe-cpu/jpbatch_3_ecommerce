
@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
            <a href="{{route('subcategories.create')}}" class="btn btn-primary float-right my-2">Add New</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">SubCategories List</h2>
          </div>          
          <table class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
              $i=1;
              @endphp
              @foreach($subcategory as $row)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->category->name}}</td>
                <td>
                  <a href="{{route('subcategories.show',$row->id)}}" class="btn btn-primary btn-sm">Detail</a>
                  <a href="{{route('subcategories.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                  <form method="post" action="{{route('subcategories.destroy',$row->id)}}" onsubmit="return confirm('Are you sure')" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="btnsubmit" class="btn btn-danger btn-sm" value="DELETE">
                  </form>                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection
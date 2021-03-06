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
            <a href="{{route('subcategories.index')}}" class="btn btn-primary float-right my-2"><< Back</a>
      </div>
    </div>
    <div class="row">
      <div class="offset-md-2 col-md-8">
        <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">Category Edit</h2>
          </div>
          <form action="{{route('subcategories.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@error('name') {{old('name')}} @else {{$subcategory->name}} @enderror" required>
              @error('rollno')
              <span  class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="name">Categories Name</label>
              <select class="form-control" name="category_id" id="category_id">
                @foreach ($category as $row) {
                  <option value="{{$row->id}}" {{$subcategory->category_id==$row->id? 'selected':''}}>
                    {{$row->name}}
                  </option>
                }
                @endforeach
              </select>
            </div>
            
            <input type="submit" name="btnsubmit" value="Save" class="btn btn-success btn-block">
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
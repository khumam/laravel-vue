@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="row">
          <!-- left column -->
          <div class="col-md-6 mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Catalog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "{{route('catalog.update', $catalog->id)}}" method = "post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value = "{{$catalog->name}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/catalogs" class="btn btn-secondary ms-2">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
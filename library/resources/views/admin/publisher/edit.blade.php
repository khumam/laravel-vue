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
                <h3 class="card-title">Input Publisher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "{{route('publisher.update', $publisher->id)}}" method = "post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value = "{{$publisher->name}}">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value = "{{$publisher->email}}">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number" value = "{{$publisher->phone_number}}">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address" value = "{{$publisher->address}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/publishers" class="btn btn-secondary ms-2">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
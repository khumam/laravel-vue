@extends('layouts.app')

@section('content')
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake"  src="{{ asset ('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
  
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-md-6">
              <h1 class="m-0">Publisher</h1>
            </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col">
              Form <strong>Publisher</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="card">
                        <form id="quickFormPublisher" action="{{ route('publisher.store')}}" method="POST">
                            @if($publisher ?? false)
                                @method("put")
                            @endif
                            @csrf()
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputNama1">Nama</label>
                                <input type="text" name="name" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama Publisher" value="{{ $publisher->name ?? '' }}" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $publisher->email ?? '' }}" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPhone1">Phone Number</label>
                                <input type="number" name="phone_number" class="form-control" id="exampleInputPhone1" placeholder="Enter Phone Number" value="{{ $publisher->phone_number ?? '' }}" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputaddress1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputaddress1" placeholder="Enter address" value="{{ $publisher->address ?? '' }}" required>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

@endsection

@push('js')
<script>
    const formpublisher = document.getElementById('quickFormPublisher');
    // untuk ubah action form edit
    if (window.location.href.includes('edit')) {
        let url = window.location.href.split('/')
        formpublisher.setAttribute('action', `/publisher/${url[url.length - 2]}`);
        formpublisher.setAttribute('method', 'POST');
    } 

    console.log('masuk',formpublisher);
</script>

<script>
$(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickFormPublisher').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endpush
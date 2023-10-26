@extends('layouts.app')

@push('css')
<style>
    .tanggal{
        width: 45%;
    }
</style>
@endpush

@section('content')
<div class="wrapper" >
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
              <h1 class="m-0">Detail Peminjaman</h1>
            </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content" id="form">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
                <div class="card">
                        <form id="quickFormtransaction">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputNama1">Anggota</label>
                                <input type="text" id="exampleInputNama1" name="anggota" value="{{ $transaction->member->name }}" class="form-control" style="width: 100%;" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputDate1">Tanggal</label>
                                <div style="display: flex; justify-content:space-between;">
                                    <input type="date" data-date="" data-date-format="dd/mm/yyyy" value="{{$transaction->date_start ?? date('Y-m-d') }}"  name="date_start" class="form-control tanggal" id="exampleInputDate1" placeholder="Tanggal Pinjam" readonly> 
                                    <span>-</span> 
                                    <input type="date" data-date="" data-date-format="dd/mm/yyyy" value="{{$transaction->date_end ?? date('Y-m-d') }}"  name="date_end" class="form-control tanggal" id="exampleInputDate2" placeholder="Tanggal Kembali" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputBook1">Books</label>
                                <ul>
                                    @foreach($books as $book)
                                    <li>
                                        {{ $book->title }}
                                    </li>
                                    @endforeach
                                </ul>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputstatus1">Status</label>
                                <input type="text" id="exampleInputstatus1" name="status" value="{{ $transaction->status == 'true' ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}" class="form-control" style="width: 100%;" readonly>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('transaction.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
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
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
    
</script>
@endpush
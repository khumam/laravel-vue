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
              <h1 class="m-0">Form {{ $transaction?'Edit' : 'Tambah' }} Peminjaman</h1>
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
                        <form id="quickFormtransaction" action="{{ route('transaction.store')}}" method="POST">
                            @if($transaction ?? false)
                                @method("put")
                            @endif
                            @csrf()
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputNama1">Anggota</label>
                                <select id="exampleInputNama1" name="anggota" class="form-control select2 @error('anggota') is-invalid @enderror" style="width: 100%;" required>
                                    <option {{ $transaction ? '' : 'selected' }} value="" disabled>Pilih Anggota</option>
                                    @foreach($members as $member)
                                    <option {{ $transaction->member_id == $member->id ? 'selected' : '' }} value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('anggota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputDate1">Tanggal</label>
                                <div style="display: flex; justify-content:space-between;">
                                    <input type="date" data-date="" data-date-format="dd/mm/yyyy" value="{{$transaction->date_start ?? date('Y-m-d') }}"  name="date_start" class="form-control tanggal" id="exampleInputDate1" placeholder="Tanggal Pinjam" required> 
                                    <span>-</span> 
                                    <input type="date" data-date="" data-date-format="dd/mm/yyyy" value="{{$transaction->date_end ?? date('Y-m-d') }}"  name="date_end" class="form-control tanggal" id="exampleInputDate2" placeholder="Tanggal Kembali" required>
                                </div>
                                @error('date_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('date_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputBook1">Books</label>
                                <select id="exampleInputBook1" class="select2 @error('books') is-invalid @enderror" name="books[]" multiple="multiple" data-placeholder="Pilih Buku" style="width: 100%;">
                                    @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ in_array($book->id, $selectedBooks) ? 'selected':'' }}>{{ $book->title }}</option>
                                    @endforeach
                                </select>
                                @error('books')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                              @if ($transaction??false)
                              <div class="form-group">
                                <label for="exampleInputstatus1">Status</label>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="status" id="status1" value="true" {{ $transaction->status == 'true' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="status1">
                                    Sudah Dikembalikan
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="status" id="status2" value="false" {{ $transaction->status == 'false' ? 'checked' : '' }}>
                                  <label class="form-check-label" for="status2">
                                    Belum Dikembalikan
                                  </label>
                                </div>
                              </div>
                              @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('transaction.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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
<script>
    const formtransaction = document.getElementById('quickFormtransaction');
    // untuk ubah action form edit
    if (window.location.href.includes('edit')) {
        let url = window.location.href.split('/')
        formtransaction.setAttribute('action', `/transaction/${url[url.length - 2]}`);
        formtransaction.setAttribute('method', 'POST');
    }
</script>
@endpush
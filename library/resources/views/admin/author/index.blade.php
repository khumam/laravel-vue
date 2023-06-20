@extends('layouts.admin')

@section('css')

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div id="controller">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Author</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5>Data Author</h5>
                <a href="#" @click="addData()" class = "btn btn-sm btn-primary pull-right">Create New Author</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Total Books</th>
                    <!--<th>Action</th>-->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($authors as $key => $author)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $author -> name }}</td>
                    <td>{{ $author -> email }}</td>
                    <td>{{ $author -> address }}</td>
                    <td>{{ $author -> phone_number }}</td>
                    <td>{{ count($author -> books) }}</td>
                    <td class = "text-right">
                          <a href="#" @click = "editData({{$author}})" class = "btn btn-warning btn-sm">Edit</a>
                          <a href="#" @click = "deleteData({{$author->id}})" class = "btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off">
                <div class="modal-header">
                  <h4 class="modal-title">Author</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> 
                <div class="modal-body">
                @csrf
                <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" :value = "data.name" required="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" :value = "data.email" required="">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number" :value = "data.phone_number" required="">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address" :value = "data.address" required="">
                  </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</div>
@endsection

@section('js')

  <script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data:{
            data : {},
            actionUrl : '{{url('authors')}}',
            editStatus : false,
        },
        mounted: function(){

        },
        methods:{
          addData(){
            this.data = {};
            this.actionUrl = '{{url('authors')}}';
            this.editStatus = false;
            $('#modal-default').modal();
          },
          editData(data){
            this.data = data;
            this.editStatus = true;
            this.actionUrl = '{{url('authors')}}'+'/'+data.id;
            $('#modal-default').modal();
          },
          deleteData(id){
            this.actionUrl = '{{url('authors')}}'+'/'+id;
            if(confirm("Are You Sure ?")){
              axios.post(this.actionUrl, {_method:'DELETE'}).then(response => {
                location.reload();
              });
            }
          }
        }

        }
    )
</script>

@endsection
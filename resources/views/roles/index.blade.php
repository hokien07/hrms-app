@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Roles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Page contents</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Name</th>
                                                    <th>Config</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($roles))
                                                    @foreach($roles as $index => $role)
                                                        <tr>
                                                            <td>{{++$index}}.</td>
                                                            <td>{{$role->name}}</td>
                                                            <td>
                                                                <a href="{{route('role.edit', $role)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                                <button class="btn btn-danger btn-delete" data-id="{{$role->id}}" data-model="role"><i class="fas fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                                <div class="card-footer">
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {
                const id = $(this).attr('data-id');
                const model = $(this).attr('data-model');
                const token = $('meta[name=csrf-token]').attr('content');
                const that = $(this);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post(`/${model}/delete`, {
                            'id' : id,
                            "_token": token
                        }, function (response) {
                            if(response.result) {
                                that.closest('tr').remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }else {
                                Swal.fire(
                                    'Error!',
                                    `${response.message}`,
                                    'error'
                                )
                            }
                        })
                    }
                })
            });
        });
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Role</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add Role</li>
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
                        <form action="{{route('role.store')}}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Form contents</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" required placeholder="Enter Role name">
                                                @error('name')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Submit</button>
                                    <button class="btn btn-primary" type="reset"><i class="fas fa-refresh"></i> Refresh</button>
                                    <a href="{{route('role.home')}}" class="btn btn-danger"><i class="fas fa-backward"></i> Back</a>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        </form>
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

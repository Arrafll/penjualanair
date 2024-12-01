@extends('layout.main')
@section('content')
<div class="container-fluid">
                        <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Airmoo</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
            <h4 class="page-title">Product</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Product List</h4>
                <p class="text-muted font-13 mb-4">
                    List product yang terdaftar dalam data.
  
                </p>
                <div class="text-lg-start my-1 mb-2">
                    <a href="/admin_add_product" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Add New</a>
                </div>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="25%">Name</th>
                            <th width="15%">Price</th>
                            <th width="25%">Created</th>
                            <th width="25%">Updated</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
                        @foreach ($product as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->price }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                                <td class="text-center"> <button type="button" class="btn btn-primary  waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i></button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick=""><i class="mdi mdi-trash-can"></i></button></td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
</div>
@endsection
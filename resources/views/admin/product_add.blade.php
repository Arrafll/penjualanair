@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/">Airmoo</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h5 class="bg-light p-2 mt-0 mb-3">Detail Produk</h5>
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Nama Produk <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="product-name" class="form-control input-form-product"
                                data-error-label="Nama produk" name="productName" placeholder="Masukkan nama produk"
                                form="form-product">
                            <div id="" class="invalid-feedback d-none">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product-name" class="form-label">Nama Brand <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="product-name" class="form-control input-form-product" name="brandName"
                                data-error-label="Nama brand" placeholder="Masukkan nama brand" form="form-product">
                            <div id="" class="invalid-feedback d-none">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product-price">Harga <span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-form-product" id="product-price" name="price"
                                data-error-label="Harga produk" placeholder="Input harga produk" form="form-product">
                            <div id="" class="invalid-feedback d-none">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="product-price">Stok <span class="text-danger">*</span></label>
                            <div class="col-lg-12 d-flex">
                                <div class="col-sm-10">
                                    <input type="number" min="0" class="form-control input-form-product"
                                        id="product-stock" name="stock" data-error-label="Harga produk"
                                        placeholder="Input stok produk" form="form-product">
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-select" id="example-select" name="unit" form="form-product">
                                        <option>Kardus</option>
                                        <option>Galon</option>
                                    </select>
                                </div>
                            </div>
                            <div id="" class="invalid-feedback d-none">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product-summary" class="form-label">Deskripsi Produk</label>
                            <textarea id="product-summary" name="productDesc" form="form-product"></textarea>
                            <div id="" class="invalid-feedback d-none">
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-row-reverse">
                            <div class="text-right">
                                <button type="reset" class="btn w-sm btn-light waves-effect"
                                    form="form-product">Reset</button>
                                <button type="button" onclick="checkFormData('form-product')"
                                    class="btn w-sm btn-success waves-effect waves-light" form="form-product">Save</button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-0 mb-3 bg-light p-2">Gambar Produk</h5>

                        <form action="{{ route('admin_product_insert') }}" method="post" id="form-product"
                            onreset="resetForm()" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Upload Gambar <span class="text-danger">*</span></h4>
                                            <p class="sub-header">
                                                Upload gambar produk yang sesuai dengan deskripsi produk anda.
                                            </p>
                                            <button type="button" class="btn btn-info waves-effect waves-light"
                                                id="addFileUploadProduct"><i class="mdi mdi-plus me-1"></i> Add
                                                Form</button>
                                            <button type="button" class="btn btn-danger waves-efefct waves-light d-none"
                                                id="rmFileUploadProduct" onclick="removeFileUploadForm()"><i
                                                    class="mdi mdi-minus me-1"></i> Delete Form</button>

                                            <div class="row" id="fileUploadProduct">
                                                <div class="col-lg-6 cardUploadFile">
                                                    <div class="mt-3">
                                                        <input type="file" name="files[]" data-plugins="dropify"
                                                            data-show-errors="true"
                                                            data-allowed-file-extensions='["jpg", "png", "jpeg"]'
                                                            data-height="300" class="dropifyForm file-form-product" />
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->

                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->
                        </form>
                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>
                    </div>
                </div> <!-- end col-->

            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
@endsection

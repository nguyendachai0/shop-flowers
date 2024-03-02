@extends('admin.layouts.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quản lý sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            @if(isset($productToEdit))
                            <form class="form-valide" action="{{ route('admin.product.update', $productToEdit->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form class="form-valide" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Tên sản phẩm
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" value="{{ $productToEdit->name ?? '' }}"
                                                    name="name" placeholder="Nhập tên sản phẩm">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Giá
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" value="{{ $productToEdit->price ?? '' }}"
                                                    name="price" placeholder="Nhập giá ...">
                                            </div>
                                        </div>
                                        
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0">Trạng thái</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" value="1" 
                                                        {{ (isset($productToEdit) && $productToEdit->status == 1) ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            Kích hoạt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" value="0" 
                                                        {{ (isset($productToEdit) && $productToEdit->status == 0) ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            Không kích hoạt
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-auto my-1">
                                                <label class="mr-sm-2">Chọn loại</label>
                                                <select class="mr-sm-2  default-select" id="inlineFormCustomSelect" name="category_id">
                                                    <option selected="">Choose...</option>
                                                    @foreach ($categories as $category)
                                                        <option {{ (isset($productToEdit) && $productToEdit->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bảng dữ liệu sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>TÊN</strong></th>
                                        <th><strong>TRẠNG THÁI</strong></th>
                                        <th><strong>GIÁ</strong></th>
                                        <th><strong>THUỘC LOẠI</strong></th>
                                        <th><strong>ẢNH</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <td><strong>{{ $key+1 }}</strong></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{  $product->status == 1 ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td><img src="{{asset('uploads/'.$product->image)}}" class="rounded-lg mr-2" width="24" alt=""></td>
                                        <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
    
                                            <!-- Delete form -->
                                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form></td>
                                      
                                    </tr>
                                    @endforeach
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
           
           
       
        </div>
    </div>
</div>
@endsection
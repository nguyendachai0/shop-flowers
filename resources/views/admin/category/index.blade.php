@extends('admin.layouts.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Loại hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            @if(isset($categoryToEdit))
                            <form class="form-valide" action="{{ route('admin.category.update', $categoryToEdit->id) }}" method="post">
                            @method('PUT')
                        @else
                            <form class="form-valide" action="{{ route('admin.category.store') }}" method="post">
                        @endif
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Tên loại
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" value="{{ $categoryToEdit->name ?? '' }}"
                                                    name="name" placeholder="Nhập tên loại..">
                                            </div>
                                        </div>
                                        
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <label class="col-form-label col-sm-3 pt-0">Trạng thái</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" value="1" 
                                                        {{ (isset($categoryToEdit) && $categoryToEdit->status == 1) ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            Kích hoạt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" value="0" 
                                                        {{ (isset($categoryToEdit) && $categoryToEdit->status == 0) ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            Không kích hoạt
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </fieldset>
                                     
                                       
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
                        <h4 class="card-title">Bảng dữ liệu loại</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>TÊN</strong></th>
                                        <th><strong>TRẠNG THÁI</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                        <td><strong>{{ $key+1 }}</strong></td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{  $category->status == 1 ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                                        <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
    
                                            <!-- Delete form -->
                                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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
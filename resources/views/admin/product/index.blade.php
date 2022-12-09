@extends('master.admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product Form</h4>
                    </div>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('product.new')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" onchange="getCategoryById(this.value)">
                                        <option value="">----Select Category Name----</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" id="subCategoryId">
                                        <option value="">----Select Sub Category Name----</option>
                                        @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="brand_id">
                                        <option value="">----Select Brand Name----</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="unit_id">
                                        <option value="">----Select Unit Name----</option>
                                        @foreach($unit as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Product Code</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control" placeholder="Product Code">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Product SKU</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sku" class="form-control" placeholder="Product SKU">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Product Price</label>
                                <div class="input-group col-sm-10">
                                    <input type="number" name="regular_price" class="form-control" placeholder="Regular Price">
                                    <input type="number" name="selling_price" class="form-control" placeholder="Selling Price">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Product Short Description</label>
                                <div class="col-sm-10">
                                    <textarea  name="short_description" class="form-control" placeholder="Product Short Description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Product Log Description</label>
                                <div class="col-sm-10">
                                    <textarea  name="long_description"  class="form-control summernote" placeholder="Product Long Description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Product Other Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="other_image[]" class="form-control-file" multiple>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Publication Status</div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="1" checked>Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="0">Unpublished
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Product new Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getCategoryById(id)
        {
           $.ajax({
               type     : "GET",
               url      : "{{url('get-sub-category-by-category')}}",
               data     :  {id: id},
               dataType : "JSON",
               success: function (response) {
                var option = '';
                option += '<option value="">----Select Sub Category Name----</option>';
                $.each(response, function (key, value) {
                    option += '<option value=" '+value.id+' ">'+value.name+'</option>';
                   });
                var subCategorySelect = $('#subCategoryId')
                   subCategorySelect.empty();
                   subCategorySelect.append(option);
               }
           });
        }
    </script>
@endsection



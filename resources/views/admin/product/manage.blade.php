@extends('master.admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category Datatable</h4>
                        </div>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Product Name</th>
                                        <th>Selling Price</th>
                                        <th>Product SKU</th>
                                        <th>Product Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{isset($product->category->name) ? $product->category->name : '' }}</td>
                                            <td>{{$product->brand->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->sku}}</td>
                                            <td>
                                                <img src="{{asset($product->image)}}" height="70" width="80">
                                            </td>
                                            <td>{{$product->status == 1 ? 'Published' : ''}}</td>
                                            <td>
                                                <a href="">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="" onclick="return confirm('are you sure to delete this.')">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
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

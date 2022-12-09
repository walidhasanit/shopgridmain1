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
                                        <th>Category Description</th>
                                        <th>Category Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <img src="{{asset($category->image)}}" alt="" height="60" width="70"/>
                                        </td>
                                        <td>{{$category->status == 1 ? 'Published' : 'Unpublished' }}</td>

                                        <td>
                                           <a href="{{route('category.edit', ['id' => $category->id])}}">
                                               <button type="submit" class="btn btn-success">
                                                   <i class="fa fa-edit"></i>
                                               </button>
                                           </a>
                                            <a href="{{route('delete.category', ['id' => $category->id])}}" onclick="return confirm('are you sure to delete this.')  ">
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

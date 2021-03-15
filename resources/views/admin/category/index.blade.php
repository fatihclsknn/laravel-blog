@extends('admin.layouts.master')
@section('title','Kategori Islemleri')
@section('content')

   <div class="row">
       <div class="col-md-4">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori</h6>
               </div>
                   <div class="card-body">
                       @if($errors->any())
                           <div class="alert alert-danger">
                               @foreach($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </div>
                       @endif
                       <form action="{{ route('category.store') }}" method="post">
                           @csrf
                       <div class="form-group">
                           <label for="">Kategori Adi</label>
                           <input type="text" class="form-control" name="title">
                       </div>
                       <div class="form-group">
                           <label for="">Kategori Slug</label>
                           <input type="text" class="form-control" name="slug">
                       </div>
                       <div class="from-group">
                           <button type="submit" class="form-control btn btn-outline-primary">Kategori Ekle</button>
                       </div>
                       </form>
                   </div>
           </div>
   </div>

       <div class="col-md-8">

           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Tüm Kategoriler</h6>
               </div>


               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                           <tr>
                               <th>ID</th>
                               <th>Kategori</th>
                               <th>Slug</th>
                               <th>İslemler</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($categories as $category)
                               <tr>
                                   <td>{{ $category->id }}</td>
                                   <td>{{ $category->title }}</td>
                                   <td>{{ $category->slug }}</td>
                                   <td >
                                       <a href="#" class="btn btn-outline-success form-control mb-1"><i class="fa fa-eye"></i></a>
                                       <a href="{{ route('category.edit',$category->id) }}"   class="btn btn-outline-secondary form-control mb-1"><i class="fa fa-edit"></i></a>
                                       <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                           <button href="" class="btn btn-outline-danger form-control"><i class="fa fa-times"></i></button>

                                       </form>
                                   </td>
                               </tr>
                           @endforeach

                           </tbody>

                       </table>

                   </div>
               </div>
           </div>


       </div>








@endsection

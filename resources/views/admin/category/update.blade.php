@extends('admin.layouts.master')
@section('title','Kategori Güncelle')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Güncelle</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Kategori Adı</label>
                    <input type="text" class="form-control" name="title" value="{{ $category->title }}">
                </div>
                <div class="form-group">
                    <label for="">Kategori Sluf</label>
                    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                </div>

                <div class="form-group">
                     <button class="form-control btn btn-outline-primary">Kategoriyi Güncellle</button>
                </div>
            </form>
        </div>
    </div>



@endsection

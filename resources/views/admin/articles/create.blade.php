@extends('admin.layouts.master')
@section('title','Yazı Olustur')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tüm Yazılar</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="">Yazı Başlığı(örnek:Messi Fenerbahçede)</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="">Slug(Örnek:messi-fenerbahçede)</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <div class="form-group">
                    <label >Kategori</label>
                    <select name="category" class="form-control">
                        <option value="">Secim Yapınız</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Makale Fotoğrafı</label>
                    <input type="file" name="image" class="form-control">
                </div>
            <div class="form-group">
                <label for="">Yazar</label>
                <input type="text" name="author" value="Fatih"  class="form-control">
            </div>
                <div class="form-group">
                    <label for="">Makale İçeriği</label>
                    <textarea  id="summernote" class="form-control" rows="4" name="contents"></textarea>
                </div>

                <div class="form-group">
                     <button class="form-control btn btn-outline-primary">Makaleyi Olustur.</button>
                </div>
            </form>
        </div>
    </div>



@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                'height':300
            });
        });
    </script>
@endsection

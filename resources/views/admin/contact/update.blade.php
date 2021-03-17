@extends('admin.layouts.master')
@section('title','Sayfa Güncelle')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Başlık</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('contact_pages.update',$contact->id) }}" METHOD="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Sayfa Başlığı</label>
                    <input type="text" class="form-control" name="title" value="{{ $contact->title }}">
                </div>
                <div class="form-group">
                    <label for="">Sayfa Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $contact->slug }}">
                </div>
                <div class="form-group">
                    <img src="{{ asset($contact->image) }}" alt="" width="100">
                    <hr>
                    <label for="">Sayfa Fotoğrafı</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Sayfa İçeriği</label>
                    <textarea  id="summernote" class="form-control" rows="4" name="contents">
                        {!! $contact->content !!}
                    </textarea>
                </div>

                <div class="from-group">
                    <button type="submit" class="form-control btn btn-outline-primary">Sayfayı Ekle</button>
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

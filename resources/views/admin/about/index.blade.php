@extends('admin.layouts.master')
@section('title','Hakkımızda Sayfası')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                    <form action="{{ route('aboutpage.store') }}" METHOD="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Sayfa Başlığı</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="">Sayfa Slug</label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Sayfa Fotoğrafı</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Sayfa İçeriği</label>
                            <textarea  id="summernote" class="form-control" rows="4" name="contents"></textarea>
                        </div>

                        <div class="from-group">
                            <button type="submit" class="form-control btn btn-outline-primary">Sayfayı Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hakkımızda Sayfaları</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Slug</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($abouts as $about)
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>
                                <img src="../{{ $about->image }}" alt="" width="90">
                            </td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->slug }}</td>
                            <td>
                                <input class="switch"  about-id="{{ $about->id }}" type="checkbox" data-on="Aktif" data-off="Pasif"  data-offstyle="danger" data-onstyle="success" @if($about->status==1) checked @endif data-toggle="toggle">

                            </td>

                            <td >
                                <a href="{{ route('front.about') }}" class="btn btn-outline-success form-control mb-1"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('aboutpage.edit',$about->id) }}"   class="btn btn-outline-secondary form-control mb-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('aboutpage.destroy',$about->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger form-control"><i class="fa fa-times"></i></button>
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

    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function (){
            $('.switch').change(function (){
                id= $(this)[0].getAttribute('about-id');
                statu=$(this).prop('checked');
                $.get("{{ route('admin.about.status') }}",{ id:id,statu:statu},function (data,status){});
            })

        })
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                'height':300
            });
        });
    </script>

@endsection

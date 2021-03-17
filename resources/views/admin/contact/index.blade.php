@extends('admin.layouts.master')
@section('title','İletism Sayfası Ayarları')
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
                    <form action="{{ route('contact_pages.store') }}" METHOD="POST" enctype="multipart/form-data">
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
            <h6 class="m-0 font-weight-bold text-primary">İlesitim Sayfaları</h6>
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
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>
                                <img src="../{{ $contact->image }}" alt="" width="90">
                            </td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->slug }}</td>
                            <td>
                                <input class="switch"  contact-id="{{ $contact->id }}" type="checkbox" data-on="Aktif" data-off="Pasif"  data-offstyle="danger" data-onstyle="success" @if($contact->status==1) checked @endif data-toggle="toggle">

                            </td>

                            <td >
                                <a href="{{ route('front.contact') }}" class="btn btn-outline-success form-control mb-1"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('contact_pages.edit',$contact->id) }}"   class="btn btn-outline-secondary form-control mb-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('contact_pages.destroy',$contact->id) }}" method="POST">
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
                id= $(this)[0].getAttribute('contact-id');
                statu=$(this).prop('checked');
                $.get("{{ route('admin.contact.status') }}",{ id:id,statu:statu},function (data,status){});
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

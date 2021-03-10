@extends('admin.layouts.master')
@section('title','Tüm Yazılar')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tüm Yazılar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Yazar</th>
                        <th>Okunma Sayısı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->getCategory->title }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->hit }}</td>
                        <td>{{ \Carbon\Carbon::parse($article->created_at)->format('j F, Y') }}</td>
                        <td>
                            <a href="#"  class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                            <a href="#"  class="btn btn-outline-secondary"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>






@endsection
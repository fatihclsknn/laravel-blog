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
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Yazar</th>
                        <th>Durum</th>
                        <th>Hit</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            <img src="../{{ $article->image }}" alt="" width="90">
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->getCategory->title }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{!! $article->status==0 ? "<span class='text-danger'>Pasif </span>" : "<span class='text-success'>   Aktif </span>" !!}</td>
                        <td>{{ $article->hit }}</td>
                        <td>{{ \Carbon\Carbon::parse($article->created_at)->format('j F, Y') }}</td>
                        <td >
                            <a href="#" class="btn btn-outline-success form-control mb-1"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('article.edit',$article->id) }}"   class="btn btn-outline-secondary form-control mb-1"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('article.destroy',$article->id) }}" method="POST">
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






@endsection

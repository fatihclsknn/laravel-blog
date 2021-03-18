@extends('admin.layouts.master')
@section('title','Kullancılar')
@section('content')



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kullanıcılar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim Soyisim</th>
                        <th>Email</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{$user->name. ' '.$user->lastName}}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <input class="switch"  user-id="{{ $user->id }}" type="checkbox" data-on="Aktif" data-off="Pasif"  data-offstyle="danger" data-onstyle="success" @if($user->status==1) checked @endif data-toggle="toggle">

                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td >
                                <a href="#"   class="btn btn-outline-secondary form-control mb-1"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('admin.users.delete',$user->id) }}" method="POST">
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
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function (){
            $('.switch').change(function (){
                id= $(this)[0].getAttribute('user-id');
                statu=$(this).prop('checked');
                $.get("{{ route('admin.users.status') }}",{ id:id,statu:statu},function (data,status){});
            })

        })
    </script>
@endsection

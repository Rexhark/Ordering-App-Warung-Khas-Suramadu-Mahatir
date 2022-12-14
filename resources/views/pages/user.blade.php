@extends('layouts.app')

@section('title', 'User')

@push('style')
<!-- CSS Libraries -->
<style>
    .modal-backdrop {
        /* bug fix - no overlay */    
        display: none;    
    }

    .modal{
        /* bug fix - custom overlay */   
        background-color: rgba(10,10,10,0.45);
    }
</style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>
                <div class="section-header-button">
                    <a href="user/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active">User</a></div>
                </div>
            </div>

            <div class="container-fluid">
                @include('components.message')
            </div>

            <div class="section-body">
                <h2 class="section-title">Daftar User</h2>
                <p class="section-lead">Berikut merupakan daftar admin dan user.</p>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-2">
                                <ul class="nav nav-pills flex-column" id="users-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="admin-tab" data-toggle="tab" href="#admintab" role="tab" aria-controls="admin" aria-selected="true">Admin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="user-tab" data-toggle="tab" href="#usertab" role="tab" aria-controls="user" aria-selected="false">User</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-10">
                                <div class="tab-content no-padding"
                                    id="myTab2Content">
                                    <div class="tab-pane fade show active" id="admintab" role="tabpanel" aria-labelledby="admin-tab">
                                        <div class="table-responsive">
                                            <table class="table-bordered table-md table">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Biografi</th>
                                                    <th width="20%" class="text-center">Aksi</th>
                                                </tr>
                                                @foreach ($admin as $a)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $a->name }}</td>
                                                    <td>{{ $a->username }}</td>
                                                    <td>{{ $a->email }}</td>
                                                    <td>{{ strip_tags($a->biography) }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="user/{{ $a->username }}" class="col btn btn-info mx-2">Detail</a>
                                                            <button type="button" class="col btn btn-danger mx-2" data-toggle="modal" data-target="#hapusdata{{$a->id}}">Hapus</button>
                                                            {{-- Modal Delete --}}
                                                            <div class="modal fade" id="hapusdata{{$a->id}}" tabindex="-1" aria-labelledby="hapusdata{{$a->id}}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="hapusdata{{$a->id}}">Konfirmasi Hapus Data User</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin ingin menghapus user ini?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <form action="user/hapus" method="post">   
                                                                                @csrf
                                                                                @method('delete')
                                                                                <input type="text" name="id" class="form-control" value="{{$a->id}}" hidden>
                                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            {{ $user->links() }}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="usertab" role="tabpanel" aria-labelledby="user-tab">
                                        <div class="table-responsive">
                                            <table class="table-bordered table-md table">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Biografi</th>
                                                    <th width="20%" class="text-center">Aksi</th>
                                                </tr>
                                                @foreach ($user as $u)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $u->name }}</td>
                                                    <td>{{ $u->username }}</td>
                                                    <td>{{ $u->email }}</td>
                                                    <td>{{ $u->biography }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <a href="user/{{ $u->username }}" class="col btn btn-info mx-2">Detail</a>
                                                            <button type="button" class="col btn btn-danger mx-2" data-toggle="modal" data-target="#hapusdata{{$u->id}}">Hapus</button>
                                                            {{-- Modal Delete --}}
                                                            <div class="modal fade" id="hapusdata{{$u->id}}" tabindex="-1" aria-labelledby="hapusdata{{$u->id}}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="hapusdata{{$u->id}}">Konfirmasi Hapus Data User</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Apakah anda yakin ingin menghapus user ini?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <form action="user/hapus" method="post">   
                                                                                @csrf
                                                                                @method('delete')
                                                                                <input type="text" name="id" class="form-control" value="{{$u->id}}" hidden>
                                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            {{ $user->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

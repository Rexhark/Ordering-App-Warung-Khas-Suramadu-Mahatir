@extends('layouts.app')

@section('title', 'Kategori')

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
                <h1>Kategori</h1>
                <div class="section-header-button">
                    <a href="{{ url('dashboard/kategori/tambah') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active">Kategori</a></div>
                </div>
            </div>
            
            <div class="container-fluid">
                @include('components.message')
            </div>

            <div class="section-body">
                <h2 class="section-title">Daftar Kategori</h2>
                <p class="section-lead">Berikut merupakan daftar kategori.</p>
                <div class="row">
                    <div class="col">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills" id="kategori-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="by-date-tab" data-toggle="tab" href="#bydatetab" role="tab" aria-controls="bydate" aria-selected="true">By Date</a>
                                        {{-- <a class="nav-link {{ Request::is('kategori/by-date') ? 'active' : '' }}" href="{{ url('kategori/by-date') }}">By Date</a> --}}
                                    </li>
                                    <li class="nav-item pl-1">
                                        <a class="nav-link" id="by-most-used-tab" data-toggle="tab" href="#bymostusedtab" role="tab" aria-controls="bymostused" aria-selected="false">By Most Used Category</a>
                                        {{-- <a class="nav-link {{ Request::is('kategori/by-most-used-category') ? 'active' : '' }}" href="{{ url('kategori/by-most-used-category') }}">By Most Used Category</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="tab-content no-padding" id="kategori-panel">
                            <div class="tab-pane fade show active" id="bydatetab" role="tabpanel" aria-labelledby="by-date-tab">
                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <tr class="text-center">
                                            <th width="5%">No.</th>
                                            <th width="20%">Kategori</th>
                                            <th width="40%">Deskripsi</th>
                                            <th width="15%">Tanggal Penginputan</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                        @foreach ($categoryByDate as $c1)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$c1->name}}</td>
                                            @if ($c1->description)
                                            <td class="text-center">{{strip_tags($c1->description)}}</td>
                                            @else
                                            <td class="text-center">Tidak ada deskripsi</td>
                                            @endif
                                            <td class="text-center p-0">{{$c1->created_at->toDateString()}}</td>
                                            <td>
                                                <div class="container-fluid row m-0 px-0">
                                                    <a href="{{ url('dashboard/kategori/edit/'.$c1->name) }}" class="btn btn-warning col mx-2">Edit</a>
                                                    <button type="button" class="col btn btn-danger mx-2" data-toggle="modal" data-target="#hapusdata{{$c1->id}}">Hapus</button>
                                                    {{-- Modal Delete --}}
                                                    <div class="modal fade" id="hapusdata{{$c1->id}}" tabindex="-1" aria-labelledby="hapusdata{{$c1->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusdata{{$c1->id}}">Konfirmasi Hapus Data Kategori</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah anda yakin ingin menghapus kategori ini?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <form action="kategori/hapus" method="post">   
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id" class="form-control" value="{{$c1->id}}" hidden>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bymostusedtab" role="tabpanel" aria-labelledby="by-most-used-tab">
                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <tr class="text-center">
                                            <th width="5%">No.</th>
                                            <th width="20%">Kategori</th>
                                            <th width="40%">Deskripsi</th>
                                            <th width="15%">Jumlah Digunakan</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                        @foreach ($categoryByMostUsed as $c2)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$c2->name}}</td>
                                            @if ($c2->description)
                                            <td class="text-center">{{strip_tags($c2->description)}}</td>
                                            @else
                                            <td class="text-center">Tidak ada deskripsi</td>
                                            @endif
                                            <td class="text-center p-0">{{$c2->food_count}}</td>
                                            <td>
                                                <div class="container-fluid row m-0 px-0">
                                                    <a href="kategori/{{ $c2->name }}" class="btn btn-warning col mx-2">Edit</a>
                                                    <button type="button" class="col btn btn-danger mx-2" data-toggle="modal" data-target="#hapusdata{{$c2->id}}">Hapus</button>
                                                    {{-- Modal Delete --}}
                                                    <div class="modal fade" id="hapusdata{{$c2->id}}" tabindex="-1" aria-labelledby="hapusdata{{$c2->id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusdata{{$c2->id}}">Konfirmasi Hapus Data User</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah anda yakin ingin menghapus kategori ini?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <form action="kategori/hapus" method="post">   
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id" class="form-control" value="{{$c2->id}}" hidden>
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

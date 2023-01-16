@extends('layouts.master')
@section('menu')
@extends('sidebar.usermanagement')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Quản lý Ứng viên</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Candidate Mangement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Danh sách ứng viên
                </div>
                <div class="card-header">
                    <div style="margin-left: 0px">
                        <a href="{{route('candidate.create')}}">
                            <span style="font-size:15px;font-height:5px;background-color: #198754;
                            border-color: #198754;border-radius:5px; color:aliceblue;padding:10px ">Tạo Mới <i class="bi bi-person-plus-fill" style="margin-top: 3px"></i></span>
                        </a>
                    </div>
                </div>
                <style>
                    .card-body th,
                    td {
                        text-align: center;
                    }
                </style>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Level</th>
                                <th>Vị trí ứng tuyển</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Người tiếp nhận</th>
                                <th class="text-center" style="weight:150px !important">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td class="id">{{ ++$key }}</td>
                                <td class="candidate_name">{{ $item->candidate_name }}</td>
                                <td class="level_name">{{ $item->level->level_name }}</td>
                                <td class="name">{{ $item->job->name }}</td>
                                <td class="email">{{ $item->email }}</td>
                                <td class="phone">{{ $item->phone }}</td>
                                <td class="status">
                                    @if( $item->status==1)
                                    ScanCV
                                    @elseif( $item->status==2)
                                    Phỏng vấn
                                    @elseif( $item->status==3)
                                    Offering
                                    @elseif( $item->status==4)
                                    Pre Onboard
                                    @elseif( $item->status==5)
                                    End
                                    @endif</td>
                                <td class="">{{ Auth::user()->name }}</td>


                                <td class="text-center" style="padding-top: 22px;weight:150px;display:flex">

                                    <a href="detailcandidate/{{$item->id}}">
                                        <span class="badge bg-secondary"><i class="bi bi-pencil-fill"></i></span>
                                    </a>
                                    <a href="candidate/{{ $item->id }}/edit" style="margin-left:5px;">
                                        <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                    </a>
                                    <form action="{{ route('candidate.destroy', $item->id) }}" type="submit" method='post' style="display:inherit; margin-left:5px">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="border:none;padding:0;background: none;" !important onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted ">
            <div class="float-start">
                <p>2022 &copy; Dương Quang</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://www.facebook.com/quangit30/">Dương Quang</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
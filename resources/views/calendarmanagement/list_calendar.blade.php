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
                    <h3>Quản lý Lịch</h3>
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
                            <li class="breadcrumb-item active" aria-current="page">Canlendar Mangement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    Danh sách Lịch của ứng viên
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
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th style="width:170px">Title</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Phòng</th>
                                <th>Người tạo lịch</th>
                                <th class="text-center" style="weight:150px !important">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td class="id">{{ ++$key }}</td>
                                <td>
                                    {{ $item['candidate']['candidate_name'] }}
                                </td>
                                {{-- @foreach($candidates as $can)
                                <td class="candidate_name">{{ $can==$can->candidate_name ? $can->candidate_name :'' }}</td>
                                @endforeach --}}
                                <td class="title">{{ $item['title'] }}</td>
                                <td class="start_time">{{ $item['start_time']}}</td>
                                <td class="end_time">{{ $item['end_time'] }}</td>
                                <td class="meeting_id">{{ $item['meeting']['meeting_name'] }}</td>
                                <td class="">{{ Auth::user()->name }}</td>

                                <td class="text-center" style="display:space-beetween; weight:150px">

                                    
                                    <a href="calendar/{{ $item['id'] }}/edit">
                                        <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                    </a>
                                    <form action="{{ route('calendar.destroy', $item['id']) }}" type="submit" method='post' style="display:inherit">
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
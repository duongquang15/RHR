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
                    <h3>Quản lý Job</h3>
                    {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
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
                            <li class="breadcrumb-item active" aria-current="page">Level Mangement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {{-- {!! Toastr::message() !!} --}}

        <section class="section">
            <div class="card">
            <div class="card-header">
                    Danh sách Job
                </div>
                <div class="card-header">
                    <div style="margin-left: 0px">
                        <a href="{{route('job.create')}}">
                            <span style="font-size:15px;font-height:5px;background-color: #198754;
                            border-color: #198754;border-radius:5px; color:aliceblue;padding:10px ">Tạo Mới <i class="bi bi-person-plus-fill" style="margin-top: 3px"></i></span>
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table table-striped" id="table1">

                        <thead>
                            <tr>
                                <th>ID</th>
                                {{-- <th>Priority</th>
                                <th>Request date</th>
                                <th>Onboard date</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Salary</th> --}}

                                <th>Tên Job</th>
                                <th>Bộ phận</th>
                                <th>Mức độ</th>
                                <th>Số lượng yêu cầu</th>
                                {{-- <th>Skill</th> --}}
                              
                                <th>Request date</th>
                                <th>Onboard date</th>
                                <!-- <th>User</th> -->

                                <th class="text-center">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td class="id">{{ ++$key }}</td>
                                {{-- <td class="priority">{{ $item->priority }}</td>
                                <td class="request_date">{{ $item->request_date }}</td>
                                <td class="onboard_date">{{ $item->onboard_date }}</td>
                                <td class="status">{{ $item->status }}</td>
                                <td class="note">{{ $item->note }}</td>
                                <td class="salary">{{ $item->salary }}</td> --}}

                                <td class="name">{{ $item->name }}</td>
                                <td class="group_name">
                                    <option value="{{ $item->group->id }}">{{ $item->group->group_name }}</option>
                                </td>
                                <td class="priority">  @if( $item->priority==1)
                                    <b style="color: red">Gấp</b>
                                    @elseif( $item->priority==2)
                                    <b style="color: green">Bình thường</b>
                                    @else
                                    <b style="color: gray">Không gấp </b>
                                    @endif</td>
                                <td class="amount">{{ $item->amount }}</td>
                                <td class="start_time">
                                    <option value="{{ $item->id}}"> {{$item->request_date}} </option>
                                </td>
                                <td class="end_time">
                                    <option value="{{$item->id}}">{{ $item->onboard_date}}</option>
                                </td>
                                {{-- <td class="skill">{{ $item->skill }}</td> --}}
                              

                                <td class="text-center">

                                   
                                    <a href="detailjob/{{$item->id}}">
                                        <span class="badge bg-secondary"><i class="bi bi-pencil-fill"></i></span>
                                    </a>
                                    <a href="job/{{ $item->id }}/edit">
                                        <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                    </a>

                                    {{-- <a href="user/{{ $item->id }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> --}}
                                    <form action="{{ route('job.destroy', $item->id) }}" type="submit" method='post' style="display:inherit">
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
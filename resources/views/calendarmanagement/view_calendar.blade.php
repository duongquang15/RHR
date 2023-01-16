@extends('layouts.master')
@section('menu')
@extends('sidebar.usermanagement')
@endsection
@section('content')
<div id="main">
    <style>
        .avatar.avatar-im .avatar-content,
        .avatar.avatar-xl img {
            width: 40px !important;
            height: 40px !important;
            font-size: 1rem !important;
        }

        .form-group[class*=has-icon-].has-icon-lefts .form-select {
            padding-left: 2rem;
        }
    </style>

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Quản lý Candidate</h3>

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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cập nhật Lịch</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('calendar.update',$data[0]->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Tên Ứng viên</label>
                                    </div>
                                    {{-- <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Candidate" id="first-name-icon" name="candidate_id" value="{{ $data[0]->candidate->candidate_name }}" disabled>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" id="first-name-icon" name="candidate_id" value="{{ !isset($item['candidate_id']) ? $data[0]->candidate->candidate_name : '' }}" disabled>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Candidate" id="first-name-icon" name="title" value="{{ $data[0]->title }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Thời gian bắt đầu</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="datetime-local" class="form-control" id="first-name-icon" name="start_time" value="{{ $data[0]->start_time}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Thời gian kết thúc</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="datetime-local" class="form-control" id="first-name-icon" name="end_time" value="{{ $data[0]->end_time}}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Phòng họp</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <select name="meeting_id" class="form-control">
                                                    {{-- <option value="{{$data[0]->level_id}}">{{$data[0]->level['level_name']}}</option> --}}
                                                    @foreach ($meeting as $l)
                                                    @if ($l->id == $data[0]->meeting_id)
                                                    <option value="{{ $l->id }}" selected>
                                                        {{ $l->meeting_name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $l->id }}">
                                                        {{ $l->meeting_name }}
                                                    </option>
                                                    @endif
    
    
                                                    @endforeach
                                                </select><div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>

                                           
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input hidden type="text" class="form-control" placeholder="Candidate" id="first-name-icon" name="user_id" value="{{ $data[0]->user_id }}">
                                                
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <a href="{{ route('calendar.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
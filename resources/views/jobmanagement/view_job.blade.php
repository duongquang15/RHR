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
                    <h3>Cập nhật Job</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Job Mangement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card-header" style=" margin-bottom: 20px;border-radius:10px">
                <h4 class="card-title">Thông tin cơ bản</h4>
            </div>
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('job.update', $data[0]->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div style="display:flex">
                                        <div class="col-2"></div>
                                        <div class="col-4">
                                            <div class="col-md-4">
                                                <label>Tên Jobs</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Name" id="first-name-icon" name="name" value="{{ $data[0]->name }}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Tên Level</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-award"></i>
                                                        </div>
                                                        <select name="level_id" class="form-control">
                                                            {{-- <option value="{{$data[0]->level_id}}">{{$data[0]->level['level_name']}}</option> --}}
                                                            @foreach ($level as $l)
                                                            @if ($l->id == $data[0]->level_id)
                                                            <option value="{{ $l->id }}" selected>
                                                                {{ $l->level_name }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $l->id }}">
                                                                {{ $l->level_name }}
                                                            </option>
                                                            @endif


                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Ngày Onboard</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="date" class="form-control" id="first-name-icon" name="onboard_date" value="{{ $data[0]->onboard_date }}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-4">
                                            <div class="col-md-4">
                                                <label>Số lượng</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Nhập số lượng" id="first-name-icon" name="amount" value="{{ $data[0]->amount }}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Mức độ ưu tiên</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                        <select name="level_id" class="form-control">

                                                            {{-- <option value="{{$data[0]->id}}">{{$data[0]->priority}}</option> --}}
                                                            @foreach ($data as $d)
                                                            @if ($d->id == $data[0]->id)
                                                            <option value="{{ $d->id }}" selected>
                                                                {{ $d->priority }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $d->id }}">
                                                                {{ $d->priority }}
                                                            </option>
                                                            @endif
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Phòng ban</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                        <select name="level_id" class="form-control">

                                                            {{-- <option value="{{$data[0]->id}}">{{$data[0]->priority}}</option> --}}
                                                            @foreach ($meeting as $met)
                                                            @if ($met->id == $data[0]->id)
                                                            <option value="{{ $met->id }}" selected>
                                                                {{ $met->meeting_name }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $met->id }}">
                                                                {{ $met->meeting_name }}
                                                            </option>
                                                            @endif
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="card-header">
                                        <h4 class="card-title">Yêu cầu công việc</h4>
                                    </div>
                                    <div style="display: flex">
                                        <div class="col-2"></div>
                                        <div class="col-8">
                                            <div class="col-md-4">
                                                <label>Skill</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                        <select class="form-control">


                                                            @foreach ($data as $d)
                                                            @if ($d->id == $data[0]->id)
                                                            <option value="{{ $d->id }}" selected>
                                                                {{ $d->skill }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $met->id }}">
                                                                {{ $d->skill }}
                                                            </option>
                                                            @endif
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Mức lương</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" id="first-name-icon" name="salary" value="{{ $data[0]->salary }}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-chat-square-dots"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label for="">Mô tả công việc <span style="color: red;">(*)</span></label>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="position-relative">
                                                        <textarea class="form-control" name="note" id="" cols="30" rows="10">{{ $data[0]->note }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <a href="{{ route('job.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
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
                <p>2021 &copy; Soeng Souy</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://soengsouy.com">Soeng Souy</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
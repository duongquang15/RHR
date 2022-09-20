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
                        <h3>Tạo mới Job</h3>

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
            <div class="card">
                <div class="card-header">
                    Thông tin cơ bản
                </div>
            </div>
            <section class="section">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('job.store') }}" class="md-float-material"
                            enctype="multipart/form-data">
                            @csrf
                            <div style="display:flex">
                                <div class="col-2"></div>
                                <div class="col-4" style="margin-right: 20px">
                                    <label>Priority</label>
                                    <div class="form-group position-relative has-icon-left mb-4">

                                        <input type="text"
                                            class="form-control form-control-lg @error('priority') is-invalid @enderror"
                                            name="priority" value="{{ old('priority') }}"
                                            placeholder="Vui lòng nhập priority">
                                        <div class="form-control-icon">
                                            <i class="bi bi-award"></i>
                                        </div>
                                        @error('priority')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <label>Request Date</label>
                                    <div class="form-group position-relative has-icon-left mb-4">

                                        <input type="date"
                                            class="form-control form-control-lg @error('request_date') is-invalid @enderror"
                                            name="request_date" value="{{ old('request_date') }}"
                                            placeholder="Vui lòng nhập request date">
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-event"></i>
                                        </div>
                                        @error('request_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="date"
                                            class="form-control form-control-lg @error('onboard_date') is-invalid @enderror"
                                            name="onboard_date" value="{{ old('onboard_date') }}"
                                            placeholder="Vui lòng nhập request date">
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-event"></i>
                                        </div>
                                        @error('onboard_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">Status</label>
                                    <div class="form-group position-relative has-icon-left mb-4">

                                        <input type="text"
                                            class="form-control form-control-lg @error('status') is-invalid @enderror"
                                            name="status" value="{{ old('status') }}" placeholder="Vui lòng nhập status">
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-checklist"></i>
                                        </div>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="">Note</label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('note') is-invalid @enderror"
                                            name="note" value="{{ old('note') }}" placeholder="Vui lòng nhập note">
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                        @error('note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('salary') is-invalid @enderror"
                                            name="salary" value="{{ old('salary') }}" placeholder="Vui lòng nhập salary">
                                        <div class="form-control-icon">
                                            <i class="bi bi-handbag-fill"></i>
                                        </div>
                                        @error('salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('amount') is-invalid @enderror"
                                            name="amount" value="{{ old('amount') }}" placeholder="Vui lòng nhập amount">
                                        <div class="form-control-icon">
                                            <i class="bi bi-list-ol"></i>
                                        </div>
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Vui lòng nhập name">
                                        <div class="form-control-icon">
                                            <i class="bi bi-chat-right-dots"></i>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('skill') is-invalid @enderror"
                                            name="skill" value="{{ old('skill') }}"
                                            placeholder="Vui lòng nhập skill">
                                        <div class="form-control-icon">
                                            <i class="bi bi-chat-right-dots"></i>
                                        </div>
                                        @error('skill')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                        <div class="col-md-12">
                                            <select name="user_id" class="form-control">
                                                <option value="">--SELECT User ID--</option>
                                                @foreach ($job as $j)
                                                    <option value="{{ $j->id }}">{{ $j->name }}</option>
                                                @endforeach



                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-2"></div>
                            </div>


                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Tạo mới</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted ">
                <div class="float-start">
                    <p>2021 &copy; Soeng Souy</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://soengsouy.com">Soeng Souy</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection

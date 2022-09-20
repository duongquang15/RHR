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
                    <h3>Tạo mới Candidate</h3>
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
                    Candidate Create
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('candidate.store') }}" class="md-float-material" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('candidate_name') is-invalid @enderror" name="candidate_name" value="{{ old('candidate_name') }}" placeholder="Vui lòng nhập candidate name">
                            <div class="form-control-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            @error('candidate_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="date" class="form-control form-control-lg @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" placeholder="Vui lòng nhập ngày sinh">
                            <div class="form-control-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" placeholder="Vui lòng nhập giới tính">
                            <div class="form-control-icon">
                                <i class="bi bi-gem"></i>
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Vui lòng nhập phone">
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Vui lòng nhập email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" placeholder="Vui lòng nhập facebook">
                            <div class="form-control-icon">
                                <i class="bi bi-facebook"></i>
                            </div>
                            @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="date" class="form-control form-control-lg @error('sent_date_cv') is-invalid @enderror" name="sent_date_cv" value="{{ old('sent_date_cv') }}" placeholder="Vui lòng nhập sent date cv">
                            <div class="form-control-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            @error('sent_date_cv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}" placeholder="Vui lòng nhập school">
                            <div class="form-control-icon">
                                <i class="bi bi-door-open"></i>
                            </div>
                            @error('school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" placeholder="Vui lòng nhập cv">
                            <div class="form-control-icon">
                                <i class="bi bi-file-medical-fill"></i>
                            </div>
                            @error('cv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" placeholder="Vui lòng nhập note">
                            <div class="form-control-icon">
                                <i class="bi bi-chat-right-dots"></i>
                            </div>
                            @error('note')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" placeholder="Vui lòng nhập skill">
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
                            <input type="text" class="form-control form-control-lg @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" placeholder="Vui lòng nhập experience">
                            <div class="form-control-icon">
                                <i class="bi bi-app-indicator"></i>
                            </div>
                            @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('current_salary') is-invalid @enderror" name="current_salary" value="{{ old('current_salary') }}" placeholder="Vui lòng nhập current salary">
                            <div class="form-control-icon">
                                <i class="bi bi-handbag-fill"></i>
                            </div>
                            @error('current_salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('status') is-invalid @enderror" name="desired_salary" value="{{ old('desired_salary') }}" placeholder="Vui lòng nhập desired salary">
                            <div class="form-control-icon">
                                <i class="bi bi-handbag-fill"></i>
                            </div>
                            @error('desired_salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="Vui lòng nhập status">
                            <div class="form-control-icon">
                                <i class="bi bi-chat-right-dots"></i>
                            </div>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://soengsouy.com">Soeng Souy</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
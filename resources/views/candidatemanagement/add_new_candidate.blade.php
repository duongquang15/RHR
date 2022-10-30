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
                <div class="card-header" style="display:flex">
                    <div class="col-8">
                        Thông tin Ứng viên
                    </div>
                    <div class="col-4" style="text-align: center;background-color: aliceblue;line-height: 3;border-radius: 10px;">
                        Liên hệ
                    </div>
                </div>
                <div class="card-body">
                    <style>
                        label {
                            font-weight: bolder;
                        }
                    </style>
                    <form method="POST" action="{{ route('candidate.store') }}" class="md-float-material" enctype="multipart/form-data">
                        @csrf
                        <div style="display:flex">
                            <div class="col-8" style="background: #ffff;">
                                <div style="display:flex;">
                                    <div class="col-6" style="padding-right: 20px;">
                                        <label for="">Họ và tên</label>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text" class="form-control form-control-lg @error('candidate_name') is-invalid @enderror" name="candidate_name" value="{{ old('candidate_name') }}" placeholder="Nhập họ và tên">
                                            <div class="form-control-icon">
                                                <i class="bi bi-award"></i>
                                            </div>
                                            @error('candidate_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label for="">Giới tính</label><br>
                                        <div class="form-group position-relative has-icon-left mb-4">

                                            Nam <input type="radio" name="gender" value="1" checked>
                                             Nữ <input type="radio" name="gender" value="0"><br>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <label for="">Trường học</label>


                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text" class="form-control form-control-lg @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}" placeholder="Nhập tên trường" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-dots"></i>
                                            </div>
                                            @error('school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label for="">CV</label>


                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="file" class="form-control form-control-lg @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" placeholder="Nhập cv" required>

                                            @error('cv')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-6" style="padding-right: 20px;">
                                        <label for="">Job</label>

                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge"></i>
                                            </div>
                                            <select name="job_id" class="form-control" required>
                                                <option>--Lựa chọn--</option>
                                                @foreach($job as $j)
                                                <option value="{{$j->id}}">{{$j->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('job_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label for="">Ngày sinh</label>
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

                                        <label for="">Ngày gửi CV</label>
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


                                        <label for="">Trạng thái</label>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text" class="form-control form-control-lg @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="Vui lòng nhập trạng thái">
                                            <div class="form-control-icon">
                                                <i class="bi bi-card-checklist"></i>
                                            </div>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-right: 20px;">
                                    <label for="">Ghi chú <span style="color: red;">(*)</span></label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <textarea name="note" id="" cols="116" rows="2" class="form-control form-control-lg" style="padding-left: 5px;" placeholder="Nhập ghi chú" required></textarea>
                                        @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-header" style="display:flex">
                                    <div class="col-8">
                                        Kinh nghiệm
                                    </div>

                                </div>

                                <div style="padding-right: 20px;">
                                    <label for="">Level</label>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                        <select name="level_id" class="form-control" required>
                                            <option>--Lựa chọn--</option>
                                            @foreach($level as $l)
                                            <option value="{{$l->id}}">{{$l->level_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div style="padding-right: 20px;">
                                    <label for="">Kỹ năng</label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                        <select name="skill" class="form-control" required>
                                            <option>--Lựa chọn--</option>
                                            <option>{{$data[0]->skill}}</option>
                                        </select>
                                        @error('skill')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div style="padding-right: 20px;">
                                    <label for="">Kinh nghiệm cơ bản </label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <textarea name="experience" id="" cols="116" rows="2" class="form-control form-control-lg" style="padding-left: 5px;" placeholder="Nhập kinh nghiệm cơ bản" required></textarea>
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div style="padding-right: 20px;display: flex;">
                                    <div style="padding-right: 20px" class="col-6">
                                        <label for="">Mức lương hiện tại</label>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <div class="form-control-icon">
                                                <i class="bi bi-handbag-fill"></i>
                                            </div>
                                            <input type="text" class="form-control form-control-lg @error('current_salary') is-invalid @enderror" name="current_salary" value="{{ old('current_salary') }}" placeholder="Nhập mức lương hiện tại">
                                            @error('current_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="">Mức lương mong muốn</label>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <div class="form-control-icon">
                                                <i class="bi bi-handbag-fill"></i>
                                            </div>
                                            <input type="text" class="form-control form-control-lg @error('desired_salary') is-invalid @enderror" name="desired_salary" value="{{ old('desired_salary') }}" placeholder="Nhập mức lương mong muốn">
                                            @error('desired_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> -->


                            </div>
                            <div class="col-4" style="background-color: aliceblue;border-radius: 15px;padding: 0px 15px 15px 15px;">
                                <div class="content-right">
                                    <label for="">Số điện thoại</label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text" rows class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <label for="">Email</label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Nhập địa chỉ email" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <label for="">Facebook</label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text" class="form-control form-control-lg @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" placeholder="Nhập địa chỉ facebook" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-facebook"></i>
                                        </div>
                                        @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
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
<!-- @extends('layouts.master') -->
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
                    <h3>Ứng viên</h3>

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
            <div class="card-header" style=" margin-bottom: 20px;border-radius:10px">
                <h4 class="card-title">Chi tiết Ứng viên</h4>

            </div>
            <div class="card">
                <div class="card-content">
                    <form class="form form-horizontal" action="{{ route('candidate.updatestatus', $data[0]->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <input type="hidden" name="id" value="{{ $data[0]->id }}">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row" style="display:flex">
                                    <div class="col-9">
                                        <div style="margin-right:10px; border-radius:10px;background:gainsboro; margin:5px;display:flex">
                                            <h6 style="padding: 1.5rem;">Thông tin ứng viên</h6>

                                        </div>
                                        <br>
                                        <div>
                                            <div class="col-12" style="display:flex">
                                                <div class="col-md-5">
                                                    <h3 style="color: #3C48C7;">{{ $data[0]->candidate_name }}</h3>

                                                </div>
                                                <div class="col-md-3" style="display:flex ">
                                                    <label for="" style="padding-right: 10px">Trạng thái</label>

                                                    @if ($data[0]->status == 1)
                                                    <h5>ScanCV</h5>
                                                    @elseif($data[0]->status == 2)
                                                    <h5>Phỏng vấn</h5>
                                                    @elseif($data[0]->status == 3)
                                                    <h5>Offering</h5>
                                                    @elseif($data[0]->status == 4)
                                                    <h5>Pre Onboard</h5>
                                                    @elseif($data[0]->status == 5)
                                                    <h5>End</h5>
                                                    @endif
                                                </div>
                                                @if ($data[0]->status >= 5)
                                                <div></div>
                                                @elseif($data[0]->status == 1)
                                                <div style="display: flex;">
                                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                                        Chọn lịch
                                                    </button>

                                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                </div>
                                                                <form>
                                                                    @csrf @method('POST')
                                                                    <div class="modal-body">
                                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                                            <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Title" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-list-ol"></i>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                                            <input type="datetime-local" class="form-control form-control-lg @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" placeholder="Giờ bắt đầu" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-list-ol"></i>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                                            <input type="datetime-local" class="form-control form-control-lg @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" placeholder="Giờ kết thúc" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-list-ol"></i>
                                                                            </div>

                                                                        </div>
                                                                        <div class="">
                                                                            <select name="meeting_id" class="form-control" required>
                                                                                <option>--Lựa chọn--</option>
                                                                                @foreach ($meeting as $met)
                                                                                <option value="{{ $met->id }}">
                                                                                    {{ $met->meeting_name }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div type="button" class="btn btn-danger" data-dismiss="modal">Close</div>
                                                                        <input type="submit" formaction="{{ route('addCalendar', $data[0]->id) }}" value="Add lịch" class="btn btn-primary">
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                @elseif($data[0]->status == 3)

                                                @if (is_null($data[0]->desired_salary))
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                                    Offer
                                                </button>
                                                @endif
                                                @if (!is_null($data[0]->desired_salary))
                                                <form action="" method="PUT"  >
                                                    <button class="btn btn-info" name="status" value="{{ $data[0]->status + '1' }}" style="padding:0px 10px !important; height:38px">Đồng ý Offer</button>

                                                </form>
                                                <form action="{{ route('candidate.destroy', $data[0]->id) }}" type="submit" method='post' style="display:inherit;margin-left:10px">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete it?')"> Từ chối</button>
                                                </form>
                                                @endif


                                                <div style="display: flex;">
                                                    <form>
                                                        @csrf @method('POST')
                                                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                                            <input type="text" class="form-control form-control-lg @error('desired_salary') is-invalid @enderror" name="desired_salary" value="{{ old('desired_salary') }}" placeholder="Mức lương" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-list-ol"></i>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div type="button" class="btn btn-danger" data-dismiss="modal">Close</div>
                                                                        <input type="submit" formaction="{{ route('offerCandidate', $data[0]->id) }}" value="Offering" class="btn btn-primary">
                                                                    </div>
                                                    </form>

                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    @else
                                    <button class="btn btn-info" name="status" value="{{ $data[0]->status + '1' }}" style="padding-left:10px;margin-top: -11px;">Chuyển đổi trạng thái</button>
                                    @endif
                                </div>
                            </div><br><br>
                            <div style="display:flex">
                                <div class="col-6">
                                    <div class="col-md-4">
                                        <label for="">Giới tính</label>
                                        @if ($data[0]->gender == 1)
                                        <h6 style="color: #3C48C7;">Nam</h6>
                                        @else
                                        <h6 style="color: #3C48C7;">Nữ</h6>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Số điện thoại</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->phone }}</h6>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="">Email</label>
                                        <h6 style="color: #3C48C7">{{ $data[0]->email }}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Ngày gửi CV</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->sent_date_cv }}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Ghi chú</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->note }}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Skill</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->skill }}</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-md-4">
                                        <label for="">Ngày sinh</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->birthday }}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Trường học</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->school }}</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Kinh nghiệm cơ bản</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->experience }}</h6>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Mức lương mong muốn</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->desired_salary }} VNĐ</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Ngày Onboard</label>
                                        <h6 style="color: #3C48C7;">{{ $data[0]->job->onboard_date }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <h6 style="padding: 1.5rem; background: bisque; border-radius: 10px; margin-top: 5px;">
                                    Luồng tuyển dụng</h6>
                            </div>
                            <div>
                                <div class="stepper d-flex flex-column mt-5 ml-2">
                                    <div class="d-flex mb-1">
                                        <div class="d-flex flex-column pr-4 align-items-center">
                                            <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1" @if ($data[0]->status >= 1) style="background:#435ebe !important" @endif>
                                                1</div>
                                            <div class="line h-100"></div>
                                        </div>
                                        <div>
                                            <h5 class="text-dark recruit">Nộp CV</h5>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex flex-column pr-4 align-items-center">
                                            <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1" @if ($data[0]->status >= 2) style="background:#435ebe !important" @endif>
                                                2</div>
                                            <div class="line h-100"></div>
                                        </div>
                                        <div>
                                            <h5 class="text-dark recruit">Phỏng vấn</h5>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex flex-column pr-4 align-items-center">
                                            <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1" @if ($data[0]->status >= 3) style="background:#435ebe !important" @endif>
                                                3</div>
                                            <div class="line h-100"></div>
                                        </div>
                                        <div>
                                            <h5 class="text-dark recruit">Offering</h5>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex flex-column pr-4 align-items-center">
                                            <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1" @if ($data[0]->status >= 4) style="background:#435ebe !important" @endif>
                                                4</div>
                                            <div class="line h-100"></div>
                                        </div>
                                        <div>
                                            <h5 class="text-dark recruit">Pre Onboard</h5>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-1">
                                        <div class="d-flex flex-column pr-4 align-items-center">
                                            <div class="rounded-circle py-2 px-3 bg-secondary text-white mb-1" @if ($data[0]->status == 5) style="background:#435ebe !important" @endif>
                                                5</div>
                                            <div class="line h-100 d-none"></div>
                                        </div>
                                        <div>
                                            <h5 class="text-dark recruit">Thử việc</h5>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>



                <style>
                    .stepper .line {
                        width: 2px;
                        background-color: lightgrey !important;
                    }

                    .stepper .lead {
                        font-size: 1.1rem;
                    }

                    .stepper .text-dark {
                        padding: 10px;
                    }
                </style>
                <!--end::Stepper-->
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
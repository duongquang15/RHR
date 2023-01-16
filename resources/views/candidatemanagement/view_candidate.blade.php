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
                    <h4 class="card-title">Cập nhật Ứng viên</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('candidate.update',$data[0]->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Candidate Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Candidate" id="first-name-icon" name="candidate_name" value="{{ $data[0]->candidate_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Level</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <select name="level_id" class="form-control">
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
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Vị trí ứng tuyển</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <select name="job_id" class="form-control">
                                                    @foreach ($job as $j)
                                                    @if ($j->id == $data[0]->job_id)
                                                    <option value="{{ $j->id }}" selected>
                                                        {{ $j->name }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $l->id }}">
                                                        {{ $j->name }}
                                                    </option>
                                                    @endif


                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <label>Birthday</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="date" class="form-control" placeholder="Birthday" id="first-name-icon" name="birthday" value="{{ $data[0]->birthday }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Gender" id="first-name-icon" name="gender" value="{{ $data[0]->gender }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Phone" id="first-name-icon" name="phone" value="{{ $data[0]->phone }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Email" id="first-name-icon" name="email" value="{{ $data[0]->email }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Facebook</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Facebook" id="first-name-icon" name="facebook" value="{{ $data[0]->facebook }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Sent Date CV</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Sent Date CV" id="first-name-icon" name="sent_date_cv" value="{{ $data[0]->sent_date_cv }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>School</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="School" id="first-name-icon" name="school" value="{{ $data[0]->school }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>CV</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="CV" id="first-name-icon" name="cv" value="{{ $data[0]->cv }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Note</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Note" id="first-name-icon" name="note" value="{{ $data[0]->note }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Skill</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Skill" id="first-name-icon" name="skill" value="{{ $data[0]->skill }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Experience</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Experience" id="first-name-icon" name="experience" value="{{ $data[0]->experience }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Current salary</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Current salary" id="first-name-icon" name="current_salary" value="{{ $data[0]->current_salary }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Desired salary</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Desired salary" id="first-name-icon" name="desired_salary" value="{{ $data[0]->desired_salary }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Status" id="first-name-icon" name="status"
                                                 value="@if( $data[0]->status==1)ScanCV
                                                    @elseif( $data[0]->status==2)Phỏng vấn
                                                    @elseif( $data[0]->status==3)Offering
                                                    @elseif( $data[0]->status==4)Pre Onboard
                                                    @elseif( $data[0]->status==5)End
                                                    @endif ">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-chat-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <a href="{{ route('candidate.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
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
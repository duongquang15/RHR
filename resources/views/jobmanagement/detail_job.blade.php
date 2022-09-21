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
                    <h3>Job</h3>

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
                <h4 class="card-title">Thông tin Job</h4>
            </div>
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div style="display:flex">

                                        <div class="col-12">
                                            <div class="col-md-4">
                                                <h1 style="color: #3C48C7;">{{ $data[0]->name }}</h1>
                                                <p>{{ $data[0]->group->group_name }}</p>
                                            </div>
                                            <hr>
                                        </div>

                                    </div>
                                    <style>
                                        .col-12 .form-control {
                                            border: none;
                                        }

                                        hr {
                                            border: 0;
                                            height: 1px;
                                            width: 85%;
                                            margin: auto;
                                        }
                                    </style>
                                    <div style="display:flex">

                                        <div class="col-12" style="display:flex;justify-content: space-between; text-align:center">
                                            <div class="form-control">
                                                <div>
                                                    <p>Số lượng</h5>
                                                </div>
                                                <div>
                                                    <h4>{{ $data[0]->amount }}</h4>
                                                </div>
                                            </div>
                                            <div class="form-control">
                                                <div>
                                                    <p>Mức độ ưu tiên</p>
                                                </div>
                                                <div>
                                                    <!-- <p>{{ $data[0]->priority }}</p> -->
                                                    @if( $data[0]->priority==1)
                                                    <h4 style="color:red">Gấp</h4>
                                                    @elseif( $data[0]->priority==2)
                                                    <h4 style="color:greenyellow">Bình thường</h4>
                                                    @else
                                                    <h4>Có thể bỏ qua</h4>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="form-control">
                                                <div>
                                                    <p>Ngày Request</p>
                                                </div>
                                                <div>
                                                    <h4>{{ $data[0]->request_date }}</h4>
                                                </div>
                                            </div>

                                            <div class="form-control">
                                                <div>
                                                    <p>Ngày Onboard</p>
                                                </div>
                                                <div>
                                                    <h4>{{ $data[0]->onboard_date }}</h4>
                                                </div>
                                            </div>

                                            <div class="form-control">
                                                <div>
                                                    <p>Status</p>
                                                </div>
                                                <div>
                                                    @if( $data[0]->status==1)
                                                    <h4 style="color:yellowgreen">Active</h4>
                                                    @else
                                                    <h4>Unactive</h4>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <hr style="  width: 84%;margin: auto;">
                                    <div style="display: flex;">

                                        <div class="col-12">
                                            <div style=" margin-bottom: 30px;margin-top: 30px;border-radius:10px">
                                                <h4 class="card-title">Mô tả công việc</h4>
                                            </div>

                                            <div">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <textarea readonly name="note" id="" cols="116" rows="10" style="font-size:20px;padding:5px 15px;color:black;background-color: #fff;background-clip: padding-box;border: 1px solid #dce7f1;border-radius:10px">{{ $data[0]->note }}</textarea>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

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
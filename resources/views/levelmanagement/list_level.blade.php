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
                    <h3>Quản lý Level</h3>
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
                    <div style="margin-left: 0px">
                        <a href="{{route('level.create')}}">
                            <span style="font-size:15px;font-height:5px;background-color: #198754;
                            border-color: #198754;border-radius:5px; color:aliceblue;padding:10px ">Tạo Mới  <i class="bi bi-person-plus-fill" style="margin-top: 3px"></i></span>
                        </a>
                        {{-- <button class="btn btn-success">aaa</button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Level Name</th>
                                <th>Description</th>
                                {{-- <th>Phone Number</th> --}}
                                {{-- <th>Status</th>
                                <th>Role Name</th> --}}
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->level_name }}</td>
                                    <td class="email">{{ $item->description }}</td>
                                    {{-- <td class="phone_number">{{ $item->phone_number }}</td> --}}
                                    {{-- @if($item->status =='Active')
                                    <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status ==null)
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->role_name =='Admin')
                                    <td class="role_name"><span  class="badge bg-success">{{ $item->role_name }}</span></td>
                                    @endif
                                    @if($item->role_name =='Super Admin')
                                    <td class="role_name"><span  class="badge bg-info">{{ $item->role_name }}</span></td>
                                    @endif
                                    @if($item->role_name =='Normal User')
                                    <td class="role_name"><span  class=" badge bg-warning">{{ $item->role_name }}</span></td>
                                    @endif --}}
                                    <td class="text-center">
                                        <!-- <a href="{{route('level.create')}}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a> -->
                                        {{-- <a href="{{ url('user/'.$item->id) }}"> --}}
                                        <a href="level/{{ $item->id }}/edit">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        
                                        {{-- <a href="user/{{ $item->id }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> --}}
                                        <form action="{{ route('level.destroy', $item->id) }}" type="submit" method='post' style="display:inherit" >
                                            @csrf
                                            @method('delete')
                                          <button  type="submit" style="border:none;padding:0;background: none;"!important onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></button>
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

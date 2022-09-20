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
                    <h3>Quản lý Candidate</h3>
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
                            <li class="breadcrumb-item active" aria-current="page">Candidate Mangement</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
       
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Candidate Datatable
                </div>
                <style>
                    .card-body th,td{
                        text-align: center;
                    }
                </style>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Candidate Name</th>
                                <!-- <th>Birthday</th> -->
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <!-- <th>Facebook</th> -->
                                <th>Send Date CV</th>
                                <th>Scholl</th>
                                <th>CV</th>
                                <th>Note</th>
                                <th>Skill</th>
                                <th>Experience</th>
                                <th>Current salary</th>
                                <th>Desired salary</th>
                                <th>Status</th>
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="priority">{{ $item->candidate_name }}</td>
                                    <!-- <td class="request_date">{{ $item->birthday }}</td> -->
                                    <td class="onboard_date">{{ $item->gender }}</td>
                                    <td class="status">{{ $item->phone }}</td>
                                    <td class="note">{{ $item->email }}</td>
                                    <!-- <td class="salary">{{ $item->facebook }}</td> -->
                                    <td class="amount">{{ $item->sent_date_cv }}</td>
                                    <td class="name">{{ $item->school }}</td>
                                    <td class="skill">{{ $item->cv }}</td>
                                    <td class="note">{{ $item->note }}</td>
                                    <td class="skill">{{ $item->skill }}</td>
                                    <td class="experience">{{ $item->experience }}</td>
                                    <td class="current_salary">{{ $item->current_salary }}</td>
                                    <td class="desired_salary">{{ $item->desired_salary }}</td>
                                    <td class="status">{{ $item->status }}</td>
                                   
                                    <td class="text-center" style="display:space-beetween">
                                        <a href="{{route('candidate.create')}}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a>
                                       
                                        <a href="candidate/{{ $item->id }}/edit">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        <form action="{{ route('candidate.destroy', $item->id) }}" type="submit" method='post' style="display:inherit" >
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

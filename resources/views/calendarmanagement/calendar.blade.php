@extends('layouts.master')
@section('menu')
@extends('sidebar.usermanagement')
@endsection
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Lịch
                </div>
                @foreach ($data as $key => $item)
                <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                          Job: <input type="text" class="form-control" id="title" value="{{ $item['title']}}" disabled>
                          Tên ứng viên: <input type="text" class="form-control" id="title" value="{{ $item['candidate']['candidate_name'] }}" disabled>
                          Phòng: <input type="text" class="form-control" id="title" value="{{ $item['meeting']['meeting_name'] }}" disabled>
                          Thời gian bắt đầu: <input type="text" class="form-control" id="title" value="{{ $item['start_time']}}" disabled>
                          Thời gian kết thúc: <input type="text" class="form-control" id="title" value="{{ $item['end_time']}}" disabled>

                          <span id="titleError" class="text-danger"></span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          {{-- <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center mt-5">FullCalendar js Laravel series with Career Development </h3>
                                <div class="col-md-11 offset-1 mt-5 mb-5">
                
                                    <div id="calendar">
                
                                    </div>
                
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var booking = @json($events);
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',
            },
            events: booking,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDays) {
                $('#bookingModal').modal('toggle');
                $('#saveBtn').click(function() {
                    var title = $('#title').val();
                    var start_time = moment(start).format('YYYY-MM-DD');
                    var end_time = moment(end).format('YYYY-MM-DD');
                    $.ajax({
                        url:"{{ route('calendar.store') }}",
                        type:"POST",
                        dataType:'json',
                        data:{ title, start_time, end_time  },
                        success:function(response)
                        {
                            $('#bookingModal').modal('hide')
                            $('#calendar').fullCalendar('renderEvent', {
                                'title': response.title,
                                'start' : response.start,
                                'end'  : response.end,

                            });
                        },
                        error:function(error)
                        {
                            if(error.responseJSON.errors) {
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },
                    });
                });
            },
            editable: true,
            // eventDrop: function(event) {
            //     var id = event.id;
            //     var start_time = moment(event.start).format('YYYY-MM-DD');
            //     var end_time = moment(event.end).format('YYYY-MM-DD');
            //     $.ajax({
            //             url:"{{ route('calendar.update', '') }}" +'/'+ id,
            //             type:"PATCH",
            //             dataType:'json',
            //             data:{ start_time, end_time  },
            //             success:function(response)
            //             {
            //                 swal("Good job!", "Event Updated!", "success");
            //             },
            //             error:function(error)
            //             {
            //                 console.log(error)
            //             },
            //         });
            // },
            eventClick: function(event){
                $('#bookingModal').modal('toggle');
                $('#saveBtn').click(function() {
                    var title = $('#title').val();
                    var start_time = moment(start).format('YYYY-MM-DD');
                    var end_time = moment(end).format('YYYY-MM-DD');
                    $.ajax({
                        url:"{{ route('calendar.update', '') }}" +'/'+ id,
                        type:"GET",
                        dataType:'json',
                        data:{ title, start_time, end_time,candidate_id,meeting_id },
                        success:function(response)
                        {
                            $('#bookingModal').modal('hide')
                            $('#calendar').fullCalendar('renderEvent', {
                                'title': response.title,
                                'start' : response.start,
                                'end'  : response.end,

                            });
                        },
                        error:function(error)
                        {
                            if(error.responseJSON.errors) {
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },
                    });
                });
            },
            selectAllow: function(event)
            {
                return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
            },
        });
        $("#bookingModal").on("hidden.bs.modal", function () {
            $('#saveBtn').unbind();
        });
        $('.fc-event').css('font-size', '13px');
        $('.fc-event').css('width', '20px');
        $('.fc-event').css('border-radius', '50%');
    });
</script>
<style>
    .fc-content{
        width: 139px;
        background-color: #3a87ad;
    }
    .fc-event {
    position: relative;
    display: inline-table;
    border-radius: 5px
    }
</style>
@endsection
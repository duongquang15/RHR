<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Hello {{$candidate->candidate_name}}</h3>
    <p> Lịch phỏng vấn của bạn:</p>
    <p>thời gian bắt đầu {{$calendar->start_time}}</p>
    <p>thời gian kết thúc {{$calendar->end_time}}</p>
</body>
</html>
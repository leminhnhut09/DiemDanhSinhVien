<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #camera {
            width: 350px;
            height: 30px;
            border: 1px solid black;
        }

    </style>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script> -->
</head>

<body>
    <div style="display: flex; justify-content:center; background:red;">
        <div style="width: 50%;">
            <video style="background: #ccc" id="video" width="640" height="480" autoplay></video>
        </div>
        <div style="width: 50%;">
            <canvas style="background: #ccc; margin-left: 40px" id="canvas" width="300" height="480"></canvas>
            <p id="listAttendence"></p>
        </div>
    </div>
    <div style="display: flex; justify-content:center; margin-top: 40px">
        <button class="btn btn-primary" id='start'>Open Camera</button>
        <button style="margin-left:10px" class="btn btn-primary" id='stop'>Stop Camera</button>
        <button style="margin-left:10px" class="btn btn-primary" id='attendence'>Attendence</button>
        <button style="margin-left:10px" class="btn btn-primary" id="snap" onClick="takePhote()">Take photo</button>
        <button style="margin-left:10px" class="btn btn-primary" id="api" onclick="sendApi({{ $mahp }})">Send
            api</button>
    </div>
    {{-- <button id="api" onClick="sendApi()">Send api</button> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='/template/teacher/app.js'></script>
</body>

</html>

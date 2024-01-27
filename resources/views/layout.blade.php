<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
 .task_list_ul {
            margin: 0px;
            padding: 5px;
        }

        .task_list_ul li {
            list-style: none;
            padding: 5px 10px 5px 30px;
            background: #fff;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
            cursor: move;
            position: relative;
            font-size: 16px;
        }


        .task_list_ul li .task_num {
            display: inline-block;
            padding: 2px 5px;
            /* width: 30px; */
            height: 20px;
            line-height: 17px;
            background: rgb(6, 160, 65);
            color: #fff;
            text-align: center;
            border-radius: 5px;
            position: absolute;
            left: -5px;
            top: 6px;
        }

        .task_list_ul li:hover {
            list-style: none;
            background: #10e0f2;
            color: #fff;
        }

        .task_list_ul li.ui-state-highlight {
            padding: 20px;
            background-color: #eaecec;
            border: 1px dotted #ccc;
            cursor: move;
            margin-top: 12px;
        }

        .task_list_ul .btn_move {
            display: inline-block;
            cursor: move;
            background: #ededed;
            border-radius: 2px;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
        }
        </style>
</head>

<body>
    <div class="container p-3">
        <div class="row">

            <div class="col-md-12">

                @if (session('message'))
                    <h3 style="color:green">{{ session('message') }}</h3>
                @endif
            </div>

            @yield('content')

    

</body>

</html>
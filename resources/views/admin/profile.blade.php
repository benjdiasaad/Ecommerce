<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('assets/img/restau.ico') }}" rel="icon">

    <title> Admin | BENJDIA Saad </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('static/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        form{
            width: 70%;
        }
        label{
            margin-bottom: 10px;
        }

        div.card-header {
            height: 50px;
            line-height: 27px;
        }
        .card-header > span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
            font-family: system-ui;
            font-size: 18px;
        }

        .card {
            background-clip: border-box;
            background-color: #fff;
            border: 1px solid rgba(0,40,100,.12);
            border-radius: 3px;
            word-wrap: break-word;
            display: flex;
            flex-direction: column;
            min-width: 0;
            position: relative;
        }
        .card, .shadow-xs {
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 5%);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('admin/partials.navbar')

        <div class="main">

            @include('admin/partials.header')

            <main class="content">
                <div class="container-fluid p-0">

                    @if($errors->any())
                        <div class="alert alert-danger" style="width: 70%;">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1 class="h3 mb-3"><strong>My </strong> Account</h1>
                    <form class="form" action="{{ route('admin.modifyprofile')}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card padding-10">
        
                            <div class="card-header">
                                <span> Update account info </span>
                            </div>
                            <hr>
                            <div class="card-body backpack-profile-form bold-labels">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="required"><strong> Name </strong></label>
                                        <br>
                                        <input required="" class="form-control" type="text" name="name" value="{{$name}}">
                                    </div>
        
                                    <div class="col-md-6 form-group">
                                        <label class="required"><strong> Email </strong> </label>
                                        <br>
                                        <input required="" class="form-control" type="email" name="email" value="{{$email}}">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="las la-save"></i> Save</button>
                                <a href="/admin/dashboard" class="btn">Cancel</a>
                            </div>
                        </div>
        
                    </form>
                </div>

                <div class="container-fluid p-0">

                    <form class="form" action="{{ route('admin.changepass') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card padding-10">
        
                            <div class="card-header">
                                <span> Change Password </span>
                            </div>
                            <hr>
                            <div class="card-body backpack-profile-form bold-labels">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label class="required"><strong> old Password </strong></label>
                                        <br>
                                        <input required="" class="form-control" type="password" name="password" value="">
                                    </div>
        
                                    <div class="col-md-4 form-group">
                                        <label class="required"><strong> New password </strong> </label>
                                        <br>
                                        <input required="" class="form-control" type="password" name="newpass" value="">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="required"><strong> Confirm password </strong> </label>
                                        <br>
                                        <input required="" class="form-control" type="password" name="confirmpass" value="">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="las la-save"></i> Change password</button>
                                <a href="/admin/dashboard" class="btn">Cancel</a>
                            </div>
                        </div>
        
                    </form>
                </div>
            </main>

            @include('admin/partials/footer')

        </div>
    </div>

    <script src="{{ asset('static/js/app.js') }}"></script>


</body>

</html>
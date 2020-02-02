@extends('welcome')

@section('content')
    <!-- Page Content -->
    <div class="container pt-4">
        <h1>My Profile</h1>
        <div class="row">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="/storage/avatars/{{ $user->avatar }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                </div>
                                <div class="userData ml-3">
                                    <form action="/avatar_profile" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="name" class="col-sm-5 control-label">Change Avatar</label>
                                            <div class="col-sm-12">
                                                <input type="file" id="customFile" name="avatar">
                                            </div>
                                        </div>

                                        <div class="form-group" id="avatarBtn" style="display: none;">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn-sm btn-primary" id="saveBtn" class="saveBtn" >Save Avatar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-12">

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                        <hr />

                            </div>
                        </div>
                        <a href="javascript:void(0)" id="editProfile" class="btn-sm btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="modal fade" id="editModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <form action="/user_profile/{{ $user->id }}" method="post" id="userForm" name="userForm" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Name" value="{{ $user->email }}" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" >Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>

        $('#editProfile').click(function () {
            $('#editModel').modal('show');
        });

        document.getElementById('customFile').onchange = function() {
            document.getElementById("avatarBtn").style.display = "block";
        };
    </script>
@endsection

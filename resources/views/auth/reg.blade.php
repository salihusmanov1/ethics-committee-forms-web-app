<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="logo">
                        <h2 class="card-title text-center">Register</h2>
                    </div>
                    <div class="card-body py-md-4">
                        <form _lpchecked="1" method="POST" action="/add-user">
                            @csrf
                            <div class="form-group">
                                <input type="name" name="name" class="form-control" value="{{old('name')}}" id="name"
                                    placeholder="Name">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email"
                                    placeholder="Email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="form-group">
                                <input type="password" name="password" class="form-control" value="" id="password"
                                    placeholder="Password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm-password">
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <a style="padding-left: 5px" href="/">Login</a>
                                <button class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



</html>

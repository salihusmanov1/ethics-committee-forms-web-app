<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="logo">
                        <h2 class="card-title text-center">Login</h2>
                    </div>
                    
                    <div class="card-body py-md-4">
                        <form _lpchecked="1" method="POST" action="{{ route('login-user') }}">
                            @if (Session::has('success'))
                                <div class="alert alert success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="button d-flex flex-row align-items-center justify-content-between">
                                <a style="padding-left: 5px" href="/register">Register</a>
                                <button type="submit" id="submit"class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script></script>
</body>

</html>

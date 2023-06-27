<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css
    ">
    {{-- <link rel="stylesheet" href="{{ asset('css/main.cs') }}"> --}}
    <title>Document</title>
</head>

<body>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login </h3>

                            <form class="px-md-2 " method="POST" action="/login">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Email</label>
                                    <input type="email" id="form3Example1q" name="email" class="form-control" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Password</label>
                                    <input type="password" id="form3Example1q" name="password" class="form-control" />
                                </div>
                                <button type="submit" class="btn btn-success btn-lg mb-1">Sign Up</button>
                                <div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

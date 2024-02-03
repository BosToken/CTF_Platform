<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    <div class="container">
        <center>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form action="login" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Your Username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Your Password">
                        </div>  
                        <div class="mt-2">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </center>
    </div>
</body>

</html>

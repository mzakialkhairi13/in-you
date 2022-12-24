<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">

    <title>Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/signin.css'); }} " rel="stylesheet">

  </head>
  <body class="text-center">

<main class="form-signin w-100 m-auto">
  <form action="register" method="POST">
    @csrf
    <img class="mb-4" src="{{ URL::asset('asset/image/logo.png'); }}" alt="" width="50%" height="50%">
    <div class="form-floating mt-3">
      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
      <label for="floatingInput">Name</label>
        @error('name')
            <div id="" class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-floating mt-1">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        @error('email')
            <div id="" class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-floating mt-1">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
        @error('password')
            <div id="" class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <button class="w-100 btn btn-lg btn-dark" type="submit">Register</button>
  </form>

  <div class="mt-2">
    <a href="/login">Sudah mempunyai akun? Masuk disini</a>
  </div>

</main>



  </body>
</html>

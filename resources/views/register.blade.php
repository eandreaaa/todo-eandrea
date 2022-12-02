@extends('leyot')

@section('konten')
<style>
  body {
    background: url('assets/img/forms.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  .container {
    width: 50%;
    background-color: white;
    margin-top: 10%;
    border-radius: 20px;
    box-shadow: 0px 10px 10px grey;
  }

  button {
    width: 603px;
  }
</style>

<div class="container">
  <div class="card-body p-5 shadow-5 text-center">
    <h2 class="fw-bold mb-5">Registrasi</h2>
    <form method="POST" action="{{route('register.input')}}">

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
      @endif

      @csrf
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="form-outline">
              <label class="form-label" for="form3Example1">Nama lengkap</label>
            <input type="text" id="form3Example1" class="form-control" name="name"/>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="form-outline">
              <label class="form-label" for="form3Example2">Username</label>
            <input type="text" id="form3Example2" class="form-control" name="username"/>
          </div>
        </div>
      </div>

      <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email</label>
        <input type="email" id="form3Example3" class="form-control" name="email"/>
      </div>

      <div class="form-outline mb-4">
          <label class="form-label" for="form3Example4">Password</label>
        <input type="password" id="form3Example4" class="form-control" name="password"/>
      </div>

      <p>Sudah punya akun? <a href="/todo">Login</a> aja!</p></p>
      {{-- <button type="submit" class="btn btn-primary btn-block mb-4">Registrasi</button> --}}
      <button type="submit" class="btn btn-primary btn-block">Registrasi</button>

    </form>
  </div>
</div>
@endsection
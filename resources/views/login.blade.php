@extends('leyot')

@section('konten')
<style>
  body {
    background: url('assets/img/loginin.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  .logcontainer {
    width: 40%;
    padding: 10px 10px;
    margin-left: 320px;
    background-color: white;
    margin-bottom: 20px;
    margin-top: 10%;
    border-radius: 20px;
    box-shadow: 3px 2px 4px 3px #b1b1b1;
  }
</style>
    <div class="iamge">
      <img src="assets/img/login.jpg" alt="">
    </div>
      <div class="logcontainer">
        <div class="col-7 col-5 col-5 offset-xl-1 mx-auto my-5">
          <form method="POST" action="{{route('login.auth')}}">

            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            @if (session('notAllowed'))
            <div class="alert alert-danger">
                {{ session('notAllowed') }}
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13">Username</label>
              <input type="text" class="form-control" placeholder="Username terdaftar" aria-label="Username" aria-describedby="addon-wrapping" name="username"> 
            </div>
  
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example23">Password</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            </div>
  
            <div class="d-flex justify-content-around align-items-center mb-4">
              <button type="submit" class="btn btn-primary btn-lg btn-block mx-auto">Login</button>
            </div>
          </form>
          <div class="d-flex justify-content-around align-items-center mb-4">
          {{-- <a href="{{url('/register')}}">  <button class="btn btn-primary">Registrasi</button></a> --}}
          <p>Belum punya akun?</p>
          <p>Yaudah sini <a href="{{url('/register')}}">buat akun</a> dulu</p>
          </div>
        </div>
      </div>
</center>
@endsection
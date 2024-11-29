@extends('layout')

@section('content')

<main class="login-form">

  <div class="cotainer">

      <div class="row justify-content-center">

          <div class="col-md-8">

              <div class="card">

                  <div class="card-header">Login</div>

                  <div class="card-body">



                      <form action="{{ route('login.post') }}" method="POST">

                          @csrf

                          <div class="form-group row">

                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address / Phone Number</label>

                              <div class="col-md-6">

                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>

                                  @if ($errors->has('email'))

                                      <span class="text-danger">{{ $errors->first('email') }}</span>

                                  @endif

                              </div>

                          </div>



                          <div class="form-group row">

                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                              <div class="col-md-6">

                                  <input type="password" id="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))

                                      <span class="text-danger">{{ $errors->first('password') }}</span>

                                  @endif

                              </div>

                          </div>


                        <div class="form-group row">

                            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                            <div class="col-md-6">

                                <input type = "radio" id="radio" name="role">
                                <label for="admin" class="col-md-4 col-form-label ">Admin</label>

                                <input type="radio" id="radio" name="role">
                                <label for="user" class="col-md-4 col-form-label ">User</label>

                            </div>

                        </div>



                          <div class="col-md-6 offset-md-4">

                              <button type="submit" class="btn btn-primary">

                                  Login

                              </button>

                              <div >

                              <p>not an user?? please click <a href="registration">register</a></p>

                              </div>

                          </div>

                      </form>

                    </div>
                </div>

                      <p id="responseMessage"></p>

                      <script>
                        $(document).ready(function () {
                      $('#postLogin').on('submit', function (e) {
                        e.preventDefault();


                        $('#response-message').html('');

                        $.ajax({
                          url: "{{ route('login.post') }}",
                          method: "POST",
                          data: $(this).serialize(),
                          success: function (response) {


                            if (response.ok) {
                                    responseMessage.textContent = alert("Logged in Successfully");
                                } else {
                                    responseMessage.textContent = result.message || alert("log in Failed");
                                }
                          },
                          error: function (xhr) {

                            $('#response-message').html('<div class="alert alert-danger">Invalid credentials. Please try again.</div>');
                          }
                        });
                      });
                    });
                    </script>





              </div>

          </div>

      </div>

  </div>

</main>

@endsection

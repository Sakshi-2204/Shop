@extends('layout')

@section('content')

<main class="login-form">

  <div class="cotainer">

      <div class="row justify-content-center">

          <div class="col-md-8">

              <div class="card">

                  <div class="card-header">Register</div>

                  <div class="card-body">



                      <form action="{{ route('register.post') }}" method="POST">

                          @csrf

                          <div class="form-group row">

                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                              <div class="col-md-6">

                                  <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}"  >

                                  @if ($errors->has('name'))

                                      <span class="text-danger">{{ $errors->first('name') }}</span>

                                  @endif

                              </div>

                          </div>



                          <div class="form-group row">

                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                              <div class="col-md-6">

                                  <input type="text" id="email_address" class="form-control" name="email"  value="{{ old('email') }}">

                                  @if ($errors->has('email'))

                                      <span class="text-danger">{{ $errors->first('email') }}</span>

                                  @endif

                              </div>

                          </div>


                          <div class="form-group row">

                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">

                                <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{ old('phone_number') }}"  >

                                @if ($errors->has('phone_number'))

                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>

                                @endif

                            </div>

                        </div>


                          <div class="form-group row">

                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                              <div class="col-md-6">

                                  <input type="password" id="password" class="form-control" name="password" >

                                  @if ($errors->has('password'))

                                      <span class="text-danger">{{ $errors->first('password') }}</span>

                                  @endif

                              </div>

                          </div>

                        </div> <div class="form-group row">

                            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                            <div class="col-md-6">

                                <input type = "radio" id="radio" name="role" value="admin">
                                <label for="admin" class="col-md-4 col-form-label ">Admin</label>

                                <input type="radio" id="radio" name="role" value="user">
                                <label for="user" class="col-md-4 col-form-label ">User</label>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                          <div class="col-md-6 offset-md-4">

                              <button type="submit" class="btn btn-primary">

                                  Register

                              </button>

                              <p>Already an user ?? please click <a href="login">login</a></p>

                          </div>

                      </form>



                  </div>

              </div>

          </div>

      </div>

  </div>

</main>

@endsection

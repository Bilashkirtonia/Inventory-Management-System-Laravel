
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
    rel="stylesheet"
    />
</head>
<body>
    <div class="container-fliud bg-success" style="width: 99%;height:100vh;">
        <div class="row">
            <div class="col-md-4 m-auto " >
                <div class="card p-5" style="margin-top: 100px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                           @if ($errors->any())
                           <div class="alert alert-danger alert-dismissible">
                            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
                            @foreach ( $errors->all() as $error )
                            <strong>{{ $error }}</strong>  
                            @endforeach
                            
                            </div>
                           @endif 
                            
                        <h4 class="text-center bold">Login here</h4>
                        <!-- Email input -->
                        <div class="form-group mb-4">
                            <div class="col-md-12">
                                <label class="form-label" for="form2Example1">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
    
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>

                        
                        </div>
                      
                        <!-- Password input -->
                        <div class="form-group mb-4">
                            <div class="col-md-12">
                                <label class="form-label" for="form2Example2">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                          
                        </div>
                      
                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                          <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="form2Example34" />
                              <label class="form-check-label" for="form2Example34"> Remember me </label>
                            </div>
                          </div>
                      
                          <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                          </div>
                        </div>
                      
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">log in</button>
                      
                        
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
        ></script>
</body>
</html>




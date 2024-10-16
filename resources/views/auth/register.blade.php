<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>WorkJob</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/color.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1>WorkJob</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">
                            <h2 class="log-title">Register</h2>
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="input" name="name" required="required" />
                                    <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="input" name="email" required="required" :value="old('email')"  />
                                    <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" required="required" />
                                    <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" required="required" />
                                    <label class="control-label" for="input">Confirm Password</label><i class="mtrl-select"></i>
                                </div>

                                <a href="{{url('login')}}" style="color:rgb(31, 182, 255); text-decoration: underline">Already have an account?</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/main.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>

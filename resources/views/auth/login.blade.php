<!DOCTYPE html>
<html lang="en">
   <head>
       <title>Able Share : SMS Platform</title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Grass login & Sign up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
         />
      <script>
         addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
      </script>
      <!-- Meta tags -->
      <!-- font-awesome icons -->
      <link href="{{ asset('auth/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--stylesheets-->
      <link href="{{ asset('auth/css/style.css') }}" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Barlow:300,400,500" rel="stylesheet">
   </head>
   <body>
   <h1 class="header-w3ls">
       <!-- <img class="img-fluid" src="{{ asset('auth/images/sahara_group_logo.png') }}" style="width: 200px;height: 90px"> -->
       <br><br>
   </h1>

      <div class="art-bothside">
         <div class="sap_tabs">
            <div id="horizontalTab">
               <ul class="resp-tabs-list">
                  <li class="resp-tab-item">
                            <div class="icon-head-wthree">
                                 <h2>Login Here</h2>
                            </div>
                    </li>
               </ul>
               <div class="clearfix"> </div>
               <div class="resp-tabs-container">
                  <div class="tab-1 resp-tab-content">
                     <div class="swm-right-w3ls">
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                           <div class="main">
                              <div class="icon-head-wthree">
                                 <!-- <h2>Login Here</h2> -->
                              </div>
                              <div class="form-left-to-w3l">
                                 <input type="text"  name="email" placeholder=" Email " required autocomplete="email" autofocus>
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                        <strong style="color: #761b18;">{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                              <div class="form-right-w3ls ">
                                 <input type="password" name="password" placeholder="Password" required autocomplete="current-password" >
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                        <strong style="color: #761b18;">{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>

                              <div class="btnn">
                                 <button type="submit">LogIn</button><br>
                              </div>

                              <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                            <button class="btn btn-sm btn-dark">{{ __('Forgot Password?') }}</button>
                                            </a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-link" href="{{ route('welcome') }}">
                                            <button class="btn btn-sm">{{ __('Home Page') }}</button>

                                            </a>
                                    </div>
                                </div>

                           </div>
                        </form>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div class="copy">
         <p>&copy; 2019 Able Share SMS. All Rights Reserved.</p>
      </div>
      <!--js working-->
      <script src="{{ asset('auth/js/jquery-2.2.3.min.js') }}"></script>
      <!--//js working-->
      <script src="{{ asset('auth/js/easyResponsiveTabs.js') }}"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion
         		width: 'auto', //auto or any width like 600px
         		fit: true // 100% fit in a container
         	});
         });
      </script>
   </body>
</html>

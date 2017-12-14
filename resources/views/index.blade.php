<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <title>Hello</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <style>
        *{
          font-family: 'Raleway', sans-serif;
        }
        body {
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #eee;
        }
        
        .form-signin {
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
          margin-bottom: 10px;
        }
        .form-signin .checkbox {
          font-weight: 400;
        }
        .form-signin .form-control {
          position: relative;
          box-sizing: border-box;
          height: auto;
          padding: 10px;
          font-size: 16px;
        }
        .form-signin .form-control:focus {
          z-index: 2;
        }
        .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
        #ex {
            color: red;
        }
        </style>
          <body>
            <div id='app'>
                <div class="container">
                  <form class="form-signin" method='POST' action=''>
                    <h2 class="form-signin-heading">Please sign in Tasker</h2>
                    <label  class="sr-only">Login</label>
                    <input type="text" v-model='login' class="form-control" placeholder="login" name="login"  autofocus>
                    <label  class="sr-only">Password</label>
                    <input type="password" v-model='password' id="inputPassword" name="password" class="form-control" placeholder="Password" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <center><a href=''>Haven't got Acc? Sign Up</a></center>
                    <button style='margin-top:3%' :disabled='disabled' class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <center><h5 id='ex' style='margin-top:5%'> @{{ isValidPassword }}</h5></center>
                     <center><h5 id='ex' style='margin-top:5%'> @{{ isValidLogin }}</h5></center>
                  </form>

                </div>
            </div><!-- /container -->
        </body>
        <script>
            var app = new Vue({
              el: '#app',
              data: {
                message: 'Hello Vue!',
                password : '',
                login : '',
                
              },
              computed : {
                  isValidPassword : function () {
                      if(/^[a-zA-Z0-9]+$/.test(this.password) === false ){
                          return 'Password exeption : only letters & number'
                      }
                      else {
                         return ''
                      }
                  },
                  isValidLogin : function () {
                      if(/^[a-zA-Z0-9]+$/.test(this.login) === false ){
                          return 'Login exeption : only letters & number'
                      }
                      else {
                         return ''
                      }
                  },
                  disabled : function() {
                      if(this.isValidLogin === '' && this.isValidPassword === ''){
                          return false
                      }
                      else {
                          return true
                      }
                  }
                  
              }
            })
        </script>
</html>
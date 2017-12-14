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
        <title>Nefis test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <style>
        *{
          font-family: 'Raleway', sans-serif;
        }
        .row{
            text-align : center;
            margin-top : 5%;
        }
        .desc{
            background-color:black;
            color : white;
            padding: 3%;
            margin: 3%;
            border : solid 2px gray;
            border-radius : 10px;
            width: 80%;
            
        }
       
          a { 
            color: red;
            text-decoration: none; /* Убираем подчеркивание у ссылок */
           }
           a:hover {
            color: white;
            text-decoration: none; /* Добавляем подчеркивание 
                                           при наведении курсора мыши на ссылку */
           }
        </style>
        <body>
            <center>
                <h1 style='margin-top: 3%;'>Hi {{ $user->login }}</h1>
                <h3 style='margin-top: 1%;'>Choose Your Desk</h3>
            </center>
            <div class="row">
            @foreach ($desks as $desk)
              <div class="col-md-4">
                  <center>
                      <div class ='desc'>
                          <h5><b>{{ $desk->name }}</b></h5>
                          <button style='margin-top : 10%' type="button" class="btn btn-outline-danger"><b><a href="http://dase23.ru/desk/{{ $desk->id}}">Go To This Desk</a></b></button>
                      </div>
                  </center>
              </div>
             @endforeach
             <div class="col-md-4">
                  <center>
                      <div class ='desc'>
                          <h5><b>Add New Desk</b></h5>
                          <a href="#myModal" style='margin-top : 10%' class="btn btn-outline-success" data-toggle="modal">Add Desk</a> 
                      </div>
                  </center>
              </div>
            </div>
            <div id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Заголовок модального окна -->
              <div class="modal-header">
                <h4 class="modal-title">Add New Desk</h4>
              </div>
              <!-- Основное содержимое модального окна -->
              <div id="app">
              <div class="modal-body">
                
                
                  <div class="form-group">
                    <label for="title">Title</label>
                    <div id='app'>
                    <form method="POST"  action="/desks">
                        {{ csrf_field() }}
                        <input v-model='task'  class="form-control" name='task' id="title" placeholder="Feed My Bear">
                        <input type='hidden' name='desk' value="{{ $desk->id }}">
                        <small id='task' ><b>@{{ isValid }}</b></small><br></br>
                        <input type="submit"  :disabled="disabled" value='Add Task' class="btn btn-primary">
                    </form>
                    </div>
                  </div>
              </div>
              <!-- Футер модального окна -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                
              </div>
            </div>
          </div>
        </div>
    </div>
    <script>
         
            
            var app = new Vue({
          el: '#app',
          data: {
            task : ''
          },
          computed: {
            isValid : function()  {
                if(/^[а-яА-ЯёЁa-zA-Z0-9\s]{3,20}$/.test(this.task) === true){
                    var a = 'okey'
                    document.getElementById('task').style.color = 'green'
                    
                }
                else {
                    var a = 'Desk Name must be 3 - 20 symbols and include only letters & numbers'
                    document.getElementById('task').style.color = 'red'
                    
                }
             return  a
            },
            disabled : function (){
                    if (this.isValid === 'okey'){
                        return false
                    }
                    else{
                        return true
                    }
                }
            },
            
    })
    </script>
</body>
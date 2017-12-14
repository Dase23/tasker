<!doctype html>
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
        .navbar{
          padding: 30px;
          border-radius: 5px;
          background-color: #333333;
          width: 100%;
        }
        .container{
          width:100%;
          text-align:center;
          margin-top: 20px;
          border : 2px solid gray;
          padding: 3%;
          border-radius:10px;
        }
        a { 
            text-decoration: none;
            color: inherit;/* Убираем подчеркивание у ссылок */
           }
           a:hover {
            color: white;
            text-decoration: none; /* Добавляем подчеркивание 
                                           при наведении курсора мыши на ссылку */
           }
        #task{
            color: red;
        }
        .done{
            color : green;
            text-decoration:line-through
        }
        
        </style>
    </head>
    <body>
      <div class="navbar">
        <button type="button" class="btn btn-primary"><a href="/desk/{{ $desk->id }}">All Tasks</a></button>
        <button type="button" class="btn btn-secondary"><a href="/desk/{{ $desk->id }}/done">Done Tasks</a></button>
        <button type="button" class="btn btn-success"><a href="/desk/{{ $desk->id }}/active">Active Task</a></button>
        <a href="#myModal" class="btn btn-danger" data-toggle="modal">Add Task</a>  
      </div>
      <center style='margin-top:20px;'><h1>{{ $desk->name }}</h1></center>
       @if (count($tasks) < 1 )
        <center>
            <h1 style='margin-top:3%'>You haven't got any Tasks on this desk</h1>
            <a style='margin-top:3%' href="#myModal" class="btn btn-danger" data-toggle="modal">Add Task</a>
        </center>
       @else
      <div class="container">
       
       @foreach ($tasks as $task)
          <div class="row"  style='margin-top:3%'>
           <div class="col-sm">
                <button type="button" class="btn btn-danger" @php echo "onclick='del(".$task->id.")'" @endphp >Delete</button>
            </div>
            <div class="col-sm">
                <h3 class="{{ $task->state}}">{{ $task->name }}</h3>
            </div>
            <div class="col-sm">
                @if ($task->state == 'Active')
                <input type="button" class="btn btn-success" @php echo "onclick='done(".$task->id.")'" @endphp value='Done'>
                @endif
            </div>
          </div>
          @endforeach
        </div>
        @endif
        <center><h1><a href='/'>To Desks</a></h1></center>
        

        <!-- HTML-код модального окна -->
        <div id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Заголовок модального окна -->
              <div class="modal-header">
                <h4 class="modal-title">Add New Task</h4>
              </div>
              <!-- Основное содержимое модального окна -->
              <div id="app">
              <div class="modal-body">
                
                
                  <div class="form-group">
                    <label for="title">Title</label>
                    <form method="POST"  action="/tasks">
                        {{ csrf_field() }}
                        <input v-model='task'  class="form-control" name='task' id="title" placeholder="Feed My Bear">
                        <input type='hidden' name='desk' value="{{ $desk->id }}">
                        <small id='task' ><b>@{{ isValid }}</b></small><br></br>
                        <input type="submit"  :disabled="disabled" value='Add Task' class="btn btn-primary">
                    </form> 
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
    </body>
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
                    var a = 'Task must be 3 - 20 symbols and include only letters & numbers'
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
    <script>
        function del(id){
            var settings = {
             'crossDomain': false,
             'url': '/tasks/'+id,
             'method': 'DELETE',
             'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
           }

          $.ajax(settings).done(function (data){
            location.reload();
          })
        }
        function done(id){
            var settings = {
             'crossDomain': false,
             'url': '/tasks/'+id,
             'method': 'POST',
             'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
           }

          $.ajax(settings).done(function (data){
            location.reload();
          })
        }
    </script>
</html>

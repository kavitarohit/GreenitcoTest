
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  </head>
    <body class="text-center">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
            <li>
              <a href="{{url('/')}}/logout"><span class="glyphicon glyphicon-user"></span> Logout</a>
            </li>
            @else
            <li>
              <a href="{{url('/')}}/login"><span class="glyphicon glyphicon-user"></span> Employee Login</a>
            </li>
            @endif
           
          </ul>
        </div>
      </nav>
    
      <div class="container">
        @if(Auth::user())

        @if($isBreackTime =='yes')
          <button type="button" class="btn btn-primary" id="btnBack">Back</button>
          @else
          <button type="button" class="btn btn-primary" id="btnStartBreak">Start Break</button>
          @endif
        @else
        <h3>Right Aligned Navbar</h3>
        <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
        @endif
      </div>
    </body>
</html>

<script type="text/javascript">
  
  $('#btnStartBreak').on('click',function() {
     jQuery.ajax({
        url: "{{ url('/start_break_time') }}",
        method: 'GET',
        success: function(result){
           location.reload();
        }});
  })


  $('#btnBack').on('click',function() {
     jQuery.ajax({
        url: "{{ url('/end_break_time') }}",
        method: 'GET',
        success: function(result){
           location.reload();
        }});
  })
</script>

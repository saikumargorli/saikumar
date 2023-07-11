<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Show Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class ="bg-info-subtle">
@if($alert)
    <div class= "alert alert-warning" role ="alert">
  {{$alert}}
</div>
<section class=" bg-warning-subtle  border border-black p-5 m-5">

@endif
    <hr><b>

    <div >value of a is :&emsp;&emsp;&nbsp;{{$data->a}} </div>
    <div>value of b is :&emsp;&emsp; {{$data->b}} </div>
    
    <div>value of opr is :&emsp; {{$data->opr}} </div>
    <hr>
    <div>the result is : &emsp;{{$data->result}} </div></b><br>
    <center>

    <a class="btn btn-primary" href="{{route('calc.logs')}}"> Back to Logs</a>

    </center>
</body>
</html>
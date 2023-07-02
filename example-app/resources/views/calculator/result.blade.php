<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class ="bg-info-subtle">
<section class=" bg-warning-subtle  border border-black p-5 m-5">
    <h1><center>Calculator result</center></h1>
    <hr><b>
    <div >value of a is :&emsp;&emsp;&nbsp;{{$a}} </div>
    <div>value of b is :&emsp;&emsp; {{$b}} </div>
    <div>value of opr is :&emsp; {{$opr}} </div>
    <hr>
    <div>the result is : &emsp;{{$result}} </div></b><br>
    <center>
    <a class="btn btn-primary" href="/calculator/form"> Back to Form </a>
    </center>
</body>
</html>
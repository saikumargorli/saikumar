<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-info-subtle ">

@if(request()->get('delete'))
<div class ="alert alert -danger" role ="alert">
    <div>
        You Are Trying tO Delete Record({{request()->get('id')}}), Are u sure?
     </div>
     <form action ="/calculator/destroy/{{request()->get('id')}}" method="post">
        @csrf
        
        <button type ="submit" class ="btn btn-danger mb-2"> confirm delete</button>
        
      <a href ="/calculator/logs">  <button type ="button" class ="btn btn-danger mb-2">Cancel</button>  </a>
</div>
@endif

    <section class=" container bg-light-subtle p-5 mx-auto my-5">
        <h1 ><center>Calculator Log's</center></h1>
        <hr>
        <br>
        <table class="table table-danger  table-bordered border-primary p-4 my-3">
            <thead class="table-dark">
                <tr>
                    <th scope=" col">id</th>
                    <th scope="col">a</th>
                    <th scope="col">b</th>
                    <th scope="col">opr</th>
                    <th scope="col">result</th>
                    <th scope="col">created</th>
                    <th scope="col">updated</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr class=>
                    <th scope="row"><a href='/calculator/show/{{$d->id}}'>{{$d->id}}</a></th>
                    <td>{{$d->a}}</td>
                    <td>{{$d->b}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                    <td>
                        <a href='/calculator/update/{{$d->id}}' class ="btn btn-success mb-2">Edit</a>

                       <a href ="?delete=1&id={{$d->id}}"  class ="btn btn-danger mb-2>Delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <center>
        <a class="btn btn-primary" href="{{route('calc.logs')}}"> back to form</a>
        </center>
    </section>
</body>

</html>
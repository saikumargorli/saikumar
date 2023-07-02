<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body class ="bg-info-subtle">
    <section class= "container bg-light-subtle p-5 mx-auto my-5">
    <h1>Calculator Form Page </h1>
    <form action="/calculator/result" method ="get">
    <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Enter A</label>
  <input type="text" class="form-control" name ='a'id="formGroupExampleInput" placeholder="Enter intiger value for a">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Enter B</label>
  <input type="text" class="form-control"name ='b' id="formGroupExampleInput2" placeholder="Enter integer value for b">
</div>

<div class="mb-3">
    <label for="inputState" class="form-label">Operation</label>
    <select id="inputState"name ="opr" class="form-select">
      <option value ="add">Addition</option>
      <option value ="sub">Subtraction</option>
      <option value ="mul">Multiplication</option>
    </select>
  </div>

<div>
<button type="submit" class="btn btn-success">Calculate</button>
<a class="btn btn-success" href="/calculator/logs">logs</a>
</div>

</form>
</section>
</body>
</html>
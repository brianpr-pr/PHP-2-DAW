<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="./style/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-exepand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Tasks App</a>
    <ul class="navbar-nav ml-auto">
      <form class="form-inline my-2 my-lg-0">
        <input type="search" id="search" class="form-control mr-sm-2"
        placeholder="Search Your Task">
        <button class="btn btn-success my-2 my-sm-0" type="submit">
          search
        </button>
      </form>
    </ul>
  </nav>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-">
        <div class="card">
          <div class="card-body">
            <form id="task-form">
              <div class="form-group">
                <input type="text" name="text" id="name" placeholder="Task Name" 
                class="form-control">
              </div>
              <div class="form-group">
                <textarea id="description" cols="30" rows="10"
                class="from-control" placeholder="Task Description"></textarea>
              </div>
              <button class="btn btn-primary btn-block text-center" type="submit">
                Save Task
              </button>
            </form>
          </div>
        </div>

      </div>
      <div class="col-md-7">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <td>Id</td>
              <td>Name</td>
              <td>Description</td>
            </tr>
          </thead>
          <tbody id="task">
          

          </tbody>

        </table>
      </div>
    </div>
  </div>

</body>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous">
</script>
<script src="app.js"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
 
@if(Session::has('success'))
 <div class="alert alert-success">
     {{ Session::get('success')}}
 </div>
@endif

@if(Session::has('errors'))
 <div class="alert alert-danger">
    {{ Session::get('errors')}}
 </div>
@endif

 <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
    <div class="card p-4 shadow-lg" style="width:450px;">
        <h3 class="text-center mb-3">Register</h3>

        <form action="{{route('registerStore')}}" method="Post">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">

              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">

              </div>

              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">

              </div>

              <div class="mb-3">
                  <label for="Address" class="form-label">Address</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">

              </div>

              <button type="submit" class="btn btn-primary w-100">register</button>
            
            <p class="text-center mt-2">
                <a href="{{route('login')}}">login</a>
            </p>
        

        </form>

    </div>
     

 </div>
      
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
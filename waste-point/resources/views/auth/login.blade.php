<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      .form-container{
        background: #fff;
        padding: 30px;
        
        width: 450px;
        height: 410px;
        margin: 15vh;
        margin-left: 73vh;
        position: relative;  

      }
    </style>
    
  </head>
  <body>
              
  <section class="container-fluid">
                 
    <section class="justify-content-center">
      
    <div class="container">
          <div class="row">
            <div class="col-sm">
              
            </div>
            <div class="col-sm">
                @if(session()->has('LoginError'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong class="align-middle">{{ session('LoginError') }}</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>  
                @endif  
            </div>
            <div class="col-sm">
              
            </div>
          </div>
        </div>
             
              
      <section class="col-12 col-sm-6 col-md-3">
      
               
             
      <form action="/login" method="POST" class="form-container border rounded shadow-sm">
        @csrf
           <h4>Login</h4>
           <p><small>Silahkan masuk menggunakan akun Waste Point untuk melanjutkan <span style="color:#32854D">aktivitas</span> Anda.</small></p>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name ="email" aria-describedby="emailHelp" placeholder="Masukkan email" autofocus required>
          <small id="emailHelp" class="form-text text-muted"></small>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          
          @enderror
        </div>
        <div class="form-group mt-2">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
          
        </div>
       
        <button type="submit" class="btn btn-success w-100 mt-3 my-3 btn"style="background-color:#32854D">Log in</button>
        <p class ="text-center"><small><small>Belum punya akun ?<a href="/register" style="color:#32854D">Daftar</a></small></small></p>
      </form>
             
      <section>
    </section>
  </section>
            
            
                    
                    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
     
          
          
      

    </script>    
    
  </body>
</html>
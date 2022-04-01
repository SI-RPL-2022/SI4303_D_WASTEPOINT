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
        
        width: 425px;
        height: 700px;
        margin: 15vh;
        margin-left:73vh;
        position: relative;}
        textarea {
         resize: none;}
        
    </style>
    
  </head>
  <body>
  <section class="container-fluid">
    <section class="justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">
      <form action="/register" method="POST" class="form-container border rounded shadow-sm">
        @csrf
           <h4>Register</h4>
           <p><small>Silahkan mendaftar akun Waste Point untuk memulai <span style="color:#32854D">aktivitas</span> Anda.</small></p>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input name="email" type="email" class="form-control mt-1 @error('email')is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email" autofocus required value="{{ old('email') }}"> 
          <small id="emailHelp" class="form-text text-muted"></small>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          
          @enderror
        </div>

        <div class="form-group mt-3">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input name ="name" type="text" class="form-control mt-1 @error('name')is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" required value="{{ old('name') }}">
          <small id="emailHelp" class="form-text text-muted"></small>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          
          @enderror
        </div>

        <div class="form-group mt-3">
          <label for="exampleInputEmail1">Nomor Hp</label>
          <input name ="nomorhp" type="number" class="form-control mt-1 @error('nomorhp')is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nomor Hp" required value="{{ old('nomorhp') }}">
          @error('nomorhp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          
          @enderror
        </div>
          
        
        <div class="form-group mt-3">
            <label for="exampleFormControlTextarea2">Alamat</label>
            <textarea name="address" class="form-control mt-2 @error('alamat')is-invalid @enderror" id="address" placeholder="Contoh: Jl. Rusa raya No. 71, Kel. Sertajaya, Kec. Cikarang Timur, Kab. Bekasi, Jawa Barat" rows="3" required value="{{ old('address') }}"></textarea>
            <small id="emailHelp" class="form-text text-muted"></small>
            @error('address')
          <div class="invalid-feedback">
            {{ $message }}
          
          @enderror
        </div>
        
        <div class="form-group mt-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control mt-1 @error('password')is-invalid @enderror" name="password" id="password" placeholder="Masukkan Password" required>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          
          @enderror
        </div>
       
        <button type="submit" class="btn btn-success w-100  mt-3 my-3 btn"style="background-color:#32854D" >Register</button>
        <p class ="text-center"><small><small>Sudah Punya Akun?<a href="/login"style="color:#32854D">Masuk</a></small></small></p>
      </form>
      <section>
    </section>
  </section>
            
            
                    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
     
          
          
      

    </script>    
    
  </body>
</html>
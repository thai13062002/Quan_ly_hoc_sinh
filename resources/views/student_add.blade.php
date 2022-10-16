<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <form method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label  class="form-label">Họ và tên</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="hovaten" >
                @error('hovaten')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="ngaysinh" >
                @error('ngaysinh')
                    <span class="text-danger">{{$message}}</span>
                 @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="diachi">
                @error('diachi')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hinh ảnh</label>
              <input class="mt-1" type="file" name="anhtailen" id="fileToUpload"> <br>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-3">Quản lý học sinh</h1>
            {{-- thong bao --}}
            @if (session()->has('Done'))
            <div class="alert alert-success">
                {{session('Done')}}
            </div>
            @endif

            @if (session()->has('Edit'))
            <div class="alert alert-success">
                {{session('Edit')}}
            </div>
            @endif

            @if (session()->has('Delete'))
            <div class="alert alert-success">
                {{session('Delete')}}
            </div>
            @endif

            <h2><a href="{{route('student-add')}}">Thêm</a></h2>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Mã </th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Anh</th>

                    <th scope="col">Edit</th>
                    <th scope="col">Xoa</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item )
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->fullname}}</td>
                      <td>{{$item->birthday}}</td>
                      <td>{{$item->address}}</td>
                      <td><img src="{{asset('upload/'.$item->photo)}}" alt="" height="100" width="100"></td>
                        <td> <a href="/student_edit/{{$item->id}}">Edit</a></td>
                        <td> <a onclick="return confirm('Bạn có chắc chắn muốn xóa không');" href="/student_destroy/{{$item->id}}">Delete</a></td>
                    </tr>

                    @endforeach


                </tbody>
              </table>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

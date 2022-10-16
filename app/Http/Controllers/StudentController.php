<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function get_all_student()
    {
        $data=DB::table('students')->get();
        return view('student_manage', compact('data'));
    }
    public function create_student()
    {
        return view('student_add');
    }
    public function add_student(Request $request)
    {
        //kien tra du lieu vao
        $request->validate([
            'hovaten'=>'required',
            'ngaysinh'=>'required',
            'diachi'=>'required',
        ]);
        $input=$request->all();
        // xu ly anh
        if($request->hasFile('anhtailen'))
        {
            $anh=$request->file('anhtailen')->extension(); // lấy đuôi định dạng ảnh .jpg
            $ten_anh=date('YmdHis').'.'.$anh; // nối giờ ảnh với đuôi ảnh
            $request->file('anhtailen')->move(public_path('upload/'),$ten_anh); // di chuyển ảnh tải lên vào thư mục upload

            $ten=$input['hovaten'];
            $ngaysinh=$input['ngaysinh'];
            $diachi=$input['diachi'];
            $hinhanh=$ten_anh;
            DB::table('students')->insert([
                'fullname'=>$ten,
                'birthday'=>$ngaysinh,
                'address'=>$diachi,
                'photo'=>$hinhanh,
            ]);
        }
        else{
            $ten=$input['hovaten'];
            $ngaysinh=$input['ngaysinh'];
            $diachi=$input['diachi'];
            DB::table('students')->insert([
                'fullname'=>$ten,
                'birthday'=>$ngaysinh,
                'address'=>$diachi,
            ]);

        }

        return redirect()->route('student')->with('Done','Thêm dữ liệu thành công');


    }
    public function get_student_by_id($id)
    {
        $data=DB::table('students')->where('id',$id)->get();
        return view('student_edit', compact('data'));
    }
    public function edit(Request $request ,$id) //update
    {
        $input=$request->all();

        if($request->hasFile('anhtailen')) // kiem tra input anh co dc chon ko
        {
            //Xóa file hình thẻ cũ
            $anhcu = DB::table('students')->select('photo')->where('id',$id)->get();
            if($anhcu[0]->photo != '' && file_exists(public_path('upload/'.$anhcu[0]->photo)))
            {
                unlink(public_path('upload/'.$anhcu[0]->photo));
            }
            //lay anh moi
            $anh=$request->file('anhtailen')->extension(); // lấy đuôi định dạng ảnh .jpg
            $ten_anh=date('YmdHis').'.'.$anh; // nối giờ ảnh với đuôi ảnh
            $request->file('anhtailen')->move(public_path('upload/'),$ten_anh); // di chuyển ảnh tải lên vào thư mục upload


            $ten=$input['hovaten'];
            $ngaysinh=$input['ngaysinh'];
            $diachi=$input['diachi'];
             $hinhanh=$ten_anh;

            DB::table('students')->where('id',$id)->update([
                'fullname'=>$ten,
                'birthday'=>$ngaysinh,
                'address'=>$diachi,
                'photo'=>$hinhanh,
            ]);
        }
        else{
            $ten=$input['hovaten'];
            $ngaysinh=$input['ngaysinh'];
            $diachi=$input['diachi'];
            DB::table('students')->where('id',$id)->update([
                'fullname'=>$ten,
                'birthday'=>$ngaysinh,
                'address'=>$diachi,
            ]);

        }

        return redirect()->route('student')->with('Edit','Sửa dữ liệu thành công');;
        // return redirect()->action([TacgiaController::class, 'index']);

    }
    public function destroy($id)
    {
        //Xóa file hình thẻ cũ
        $anhcu = DB::table('students')->select('photo')->where('id',$id)->get();
        if($anhcu[0]->photo != '' && file_exists(public_path('upload/'.$anhcu[0]->photo)))
        {
            unlink(public_path('upload/'.$anhcu[0]->photo));
        }
        DB::table('students')->where('id',$id)->delete();
        return redirect()->route('student')->with('Delete','Xoá dữ liệu thành công');;

}
}

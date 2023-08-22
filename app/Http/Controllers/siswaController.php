<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\jeniskelamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function chart(){
        $genderChart['genderChart']=$genderChart->build();
        return view('chart');
    }

    public function index(Request $request, GenderChart $genderChart)
    {
        $laki = siswa::where('id_jeniskelamin', '=', 1)->count();
        $perempuan=siswa::where('id_jeniskelamin', '=', 2)->count();
        $total=siswa::count();



        $katakunci =$request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = siswa::where('nim', 'like', "%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{

            $data = siswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }
        return view('siswa.index',['siswa_laki'=>$laki, 'siswa_perempuan'=>$perempuan, 'total_siswa'=>$total])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nim = $request->input('nim');
        $siswa->nama = $request->input('nama');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        $siswa->alamat = $request->input('alamat');
        $siswa->id_jeniskelamin = $request->input('id_jeniskelamin');
        $siswa->save();
        // Session::flash('nim',$request->nim);
        // Session::flash('nama',$request->nama);
        // Session::flash('tanggal_lahir',$request->tanggal_lahir);
        // Session::flash('alamat',$request->alamat);
        // Session::flash('id_jeniskelamin',$request->id_jeniskelamin);

        // $request->validate([
        //     'nim'=> 'required|numeric|unique:siswas,nim',
        //     'nama'=> 'required',
        //     'tanggal_lahir'=> 'required',
        //     'alamat'=> 'required',
        //     'id_jeniskelamin'=> 'required',
        // ],[
        //     'nim.required'=>'NIM Wajib Diisi',
        //     'nim.numeric'=>'NIM Wajib angka',
        //     'nim.unique'=>'NIM sudah ada dalam database',
        //     'nama.required'=>'nama Wajib Diisi',
        //     'tanggal_lahir.required'=>'Tanggal Lahir Wajib Diisi',
        //     'alamat.required'=>'Alamat Wajib Diisi',
        //     'id_jeniskelamin.required'=>'id_jeniskelamin wajib diisi',
        // ]);
        // $data =[
        //     'nim'=>$request->nim,
        //     'nama'=>$request->nama,
        //     'tanggal_lahir'=>$request->tanggal_lahir,
        //     'alamat'=>$request->alamat,
        //     'id_jeniskelamin'=>$request->id_jeniskelamin,
        // ];
        // siswa::create($data);
        return redirect()->to('siswa')->with('Success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('nim', $id)->first();
        return view ('siswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([

            'nama'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
        ],[
            'nama.required'=>'nama Wajib Diisi',
            'tanggal_lahir.required'=>'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required'=>'jenis_kelamin wajib diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
        ]);
        $data =[

            'nama'=>$request->nama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'alamat'=>$request->alamat,
        ];
        siswa::where('nim',$id)->update($data);
        return redirect()->to('siswa')->with('Success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nim',$id)->delete();
        return redirect()->to('siswa')->with ('Success', 'Berhasil Melakukan Delet Data');
    }
}

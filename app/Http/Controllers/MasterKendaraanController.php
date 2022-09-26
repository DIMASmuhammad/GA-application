<?php
namespace App\Http\Controllers;

use App\Models\MasterKendaraan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MasterKendaraanController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $datakendaraan = MasterKendaraan::paginate(4);
            return view('master.masterkendaraan.index', compact(['datakendaraan']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterkendaraan.create');
        }
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
        $request->validate([
        'mk_nama_kendaraan' => 'required|min:5|max:20',
        ]);
        $kendaraan = new MasterKendaraan();
        $kendaraan->mk_nama_kendaraan = $request->mk_nama_kendaraan;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_kendaraan.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterKendaraan $pic)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $kendaraan = MasterKendaraan::find($id);
            return view('master.masterkendaraan.edit',compact('kendaraan'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterKendaraan  $pic
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'mk_nama_kendaraan' => 'required|min:5|max:15',
        ]);
        $kendaraan = MasterKendaraan::find($id);
        $kendaraan->mk_nama_kendaraan = $request->mk_nama_kendaraan;
        $kendaraan->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_kendaraan.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterKendaraan::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_pic.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}

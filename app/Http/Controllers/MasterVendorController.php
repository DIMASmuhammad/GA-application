<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterVendor;
use RealRashid\SweetAlert\Facades\Alert;

class MasterVendorController extends Controller
{
     /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $datavendor = MasterVendor::paginate(4);
            return view('master.mastervendor.index', compact(['datavendor']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.mastervendor.create');
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
        'mv_nama_vendor' => 'required|min:5|max:30',
        'mv_lokasi' => 'required|min:5|max:200',
        ]);
        $mastervendor = new MasterVendor();
        $mastervendor->mv_nama_vendor = $request->mv_nama_vendor;
        $mastervendor->mv_lokasi = $request->mv_lokasi;
        $mastervendor->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_vendor.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function show(MasterPic $pic)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($pic);
            $vendor = MasterVendor::find($id);
            return view('master.mastervendor.edit',compact('vendor'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterPic  $pic
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'mv_nama_vendor' => 'required|min:5|max:100',
        'mv_lokasi' => 'required|min:5|max:200',
        ]);
        $vendor = MasterVendor::find($id);
        $vendor->mv_nama_vendor = $request->mv_nama_vendor;
        $vendor->mv_lokasi = $request->mv_lokasi;
        // dd($vendor);
        $vendor->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_vendor.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterVendor::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_vendor.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}

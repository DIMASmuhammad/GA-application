<?php

namespace App\Http\Controllers;

use App\Models\MasterLokasiAsset;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterLokasiAssetController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $datalokasiasset = MasterLokasiAsset::paginate(4);
            return view('master.masterlokasiasset.index', compact(['datalokasiasset']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterlokasiasset.create');
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
        'mla_lokasi_asset' => 'required|min:5|max:100',
        ]);
        $masterlokasiasset = new MasterLokasiAsset();
        $masterlokasiasset->mla_lokasi_asset = $request->mla_lokasi_asset;
        $masterlokasiasset->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_lokasiasset.index');
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
            $lokasiasset = MasterLokasiAsset::find($id);
            return view('master.masterlokasiasset.edit',compact('lokasiasset'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterPic  $lokasiasset
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'mla_lokasi_asset' => 'required|min:5|max:100',
        ]);
        $lokasiasset = MasterLokasiAsset::find($id);
        $lokasiasset->mla_lokasi_asset = $request->mla_lokasi_asset;
        $lokasiasset->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_lokasiasset.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterLokasiAsset::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_lokasiasset.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }
}

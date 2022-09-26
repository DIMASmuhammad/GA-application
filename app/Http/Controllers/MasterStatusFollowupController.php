<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterStatusFollowup;
use RealRashid\SweetAlert\Facades\Alert;

class MasterStatusFollowupController extends Controller
{
        /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index()
        {
            $datastatusfollowup = MasterStatusFollowup::paginate(4);
            return view('master.masterstatusfollowup.index', compact(['datastatusfollowup']));
        }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        return view('master.masterstatusfollowup.create');
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
        'msf_status' => 'required|min:5|max:15',
        ]);
        $masterstatusfollowup = new MasterStatusFollowup();
        $masterstatusfollowup->msf_status = $request->msf_status;
        $masterstatusfollowup->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('master_statusfollowup.index');
        }
        /**
        * Display the specified resource.
        *
        * @param  \App\MasterPic  $statusfollowup
        * @return \Illuminate\Http\Response
        */
        public function show(MasterPic $statusfollowup)
        {
        // return view('',compact(''));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\MasterPic  $statusfollowup
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            // dd($statusfollowup);
            $statusfollowup = MasterStatusFollowup::find($id);
            return view('master.masterstatusfollowup.edit',compact('statusfollowup'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\MasterPic  $statusfollowup
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $request->validate([
        'msf_status' => 'required|min:5|max:50',
        ]);
        $statusfollowup = MasterStatusFollowup::find($id);
        $statusfollowup->msf_status = $request->msf_status;
        $statusfollowup->save();
        Alert::success('Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('master_statusfollowup.index');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Company  $company
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            $id = MasterStatusFollowup::find($id);
            $id->delete();
        // Alert::success('Berhasil', 'Data Berhasil Dihapus');
        // return redirect()->route('master_statusfollowup.index');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
        }

}

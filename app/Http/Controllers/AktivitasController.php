<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AktivitasController extends Controller
{
    public function index()
    {
        // $events = array();
        $dataAktivitas = Aktivitas::all();
        foreach ($dataAktivitas as $aktivitas){
            $events[]=[
            'id'    => $aktivitas->id,
            'title' => $aktivitas->title,
            'reminder' => $aktivitas->reminder,
            'todate' => $aktivitas->todate,
            'ulangi' => $aktivitas->ulangi,
            'start' => $aktivitas->start_date,
            'end'   => $aktivitas->end_date,
            'deskripsi'   => $aktivitas->deskripsi,
            'penanganan'  => $aktivitas->penanganan,
            'prioritas'   => $aktivitas->prioritas,
            'color'   => $aktivitas->color,
            ];
        }
        return view('app.aktivitas.index', ['events' => $events]);
    }
    
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string'
        // ]);

        if($request->ulangi == "allday"){
            for($i=$request->start_date; $i<=$request->todate; $i++){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => $request->start_date++,
                'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'penanganan' => $request->penanganan,
                'prioritas' => $request->prioritas,
                    ]);
            }
        }elseif($request->ulangi == "weekly") {
            // for($i=$request->start_date; $i<=$request->todate; $i++){
                $aktivitas = Aktivitas::create([
                'title' => $request->title,
                'reminder' => $request->reminder,
                'ulangi' => $request->ulangi,
                'todate' => $request->todate,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'deskripsi' => $request->deskripsi,
                'penanganan' => $request->penanganan,
                'prioritas' => $request->prioritas,
                    ]);
            // }
        }
        return response()->json([
            'id'    => $aktivitas->id,
            'start' => $aktivitas->start_date,
            'end'   => $aktivitas->end_date,
            'title' => $aktivitas->title,
            'reminder'  => $aktivitas->reminder,
            'ulangi'    => $aktivitas->ulangi,
            'todate'    => $aktivitas->todate,
            'deskripsi' => $aktivitas->deskripsi,
            'penanganan' => $aktivitas->penanganan,
            'prioritas'  => $aktivitas->prioritas,
            'color'  => $aktivitas->color,
        ]); 
    }
    public function update(Request $request,$id)
    {
        $aktivitas = Aktivitas::find($id);
        if (! $aktivitas) {
            return response()->json([
                'error' => 'enable to locate the event'
            ], 404);
        }
        $aktivitas->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }
    public function destroy($id)
    {
        $aktivitas = Aktivitas::find($id);
        if (! $aktivitas) {
            return response()->json([
                'error' => 'enable to locate the event'
            ], 404);
        }
        $aktivitas->delete();
        return $id;

    }
    // public function destroym($id)
    // {
    //     $aktivitas = Aktivitas::where('start');
    //     $aktivitas = Aktivitas::find($id);
    //     $aktivitas->delete();

    // }
    


}

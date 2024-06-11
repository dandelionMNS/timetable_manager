<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::orderByRaw('ISNULL(semester), semester ASC')->get();
        return view("admin.batch", compact("batches"));
    }

    public function batchAdd(Request $request)
    {

        $batch = new Batch();
        $batch->semester = $request->input("semester");
        $batch->intake = $request->input("intake");
        $batch->save();

         $batches = Batch::orderByRaw('ISNULL(semester), semester ASC')->get();
        return view("admin.batch", compact("batches"));
    }

    public function batchUpdate(Request $request, $id)
    {  
       $batch = Batch::findOrFail($id);
       $batch->semester = $request->input("semester");
       $batch->intake = $request->input("intake");
       $batch->save();   
       
        $batches = Batch::orderByRaw('ISNULL(semester), semester ASC')->get();
       return view('admin.batch', compact('batches'));
    }

    public function batchDelete($id){
        $batch = Batch::findOrFail($id);
        $batch->delete();

        $batches = Batch::orderByRaw('ISNULL(semester), semester ASC')->get();
        return view('admin.batch', compact('batches'));
     }
}

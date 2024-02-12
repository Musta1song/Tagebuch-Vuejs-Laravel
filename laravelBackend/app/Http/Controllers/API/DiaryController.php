<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entry;
Use Log;





class DiaryController extends Controller
{

    public function store(Request $request)
    {
        $Entry = new Entry([
          'entry' => $request->get('entry'),
          'date' => $request->get('date'),
        ]);
        $Entry->save();
        return response()->json('Successfully added');
    
    }
  
    public function getAll(){
      $data = Entry::get();
      return response()->json($data, 200);
    }
    public function get($id){
      $data = Entry::find($id);
      return response()->json($data, 200);
    }

    public function destroy($id)
  {
    $post = Entry::find($id);
    $post->delete();
    return redirect()->route('entry.index')
      ->with('success', 'Entry deleted successfully');
  }
  
  }
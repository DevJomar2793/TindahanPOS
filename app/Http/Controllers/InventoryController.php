<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Provider\AppServiceProvider;

class InventoryController extends Controller

{
    public function index()
    {
        $result = [];

        // Get all
        // $inventories = Inventory::all();

        // Get specific column
        $inventories = Inventory::get();
        
        if($inventories->count() > 0) {

            for ($i=0; $i < $inventories->count(); $i++) { 

                if($inventories[$i]->total < 20) {
                    $statusMessage = 'Malapit na to maubos.';
                } else {
                    $statusMessage = 'Goods pa to.';
                }
                
                $result[] = [
                    'id'            => $inventories[$i]->id,
                    'description'   => $inventories[$i]->description,
                    'item'          => $inventories[$i]->item,
                    'total'         => $inventories[$i]->total,
                    'status'        => $statusMessage,
                ];
            }
        }
 
        return view ('inventory.index')->with('inventories', $result);
    }
    
    public function create()
    {
        return view('inventory.create');
    }

    public function add()
    {
        return view('inventory.add');
    }
  
    public function store(Request $request)
    {
    
    // ***For All and Specific request store code.***
    
    //    #All
    //    $sample = $request->all();

    //    #Specific
    //    $Sample = new inventory();

    //    $Sample->description = request('description');
    //    $Sample->item        = request('item');
    //    $Sample->total       = request('total');
    //    $sample->save();

        // $input = new Inventory();

        // $input->description     = request('description');
        // $input->item            = request('item');
        // $input->total           = request('total');
        // $input->save();

        
        //Validating Request Code
        
        $inventories = $request->validate([
            'description' => 'required',
            'item' => 'required',
            'total' => 'required'
        ]);

        $form = new Inventory;
        $form->description = $inventories['description'];
        $form->item = $inventories['item'];
        $form->total = $inventories['total'];
        $form->save();

        return redirect('inventory')->with('flash_message', 'Item Addedd!');  
    }

    
    
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }
    
    public function edit($id)
    {
        $inventories = Inventory::find($id);
        return view('inventory.edit')->with('inventories', $inventories);
    }
  
    public function update(Request $request, $id)
    {
        // $student = Student::find($id);
        // $input = $request->all();
        // $student->update($input);
        // return redirect('student')->with('flash_message', 'student Updated!');
        
        
        // $inventories = Inventory::find($id);
        // $update = $request->all();
        // $inventories->update($update);
       
        
        // $request->validate([
        //     'description' => ['required', 'form_complete:description'],
        //     // 'item' => 'required',
           
        // ]);

        // $inventories = $request->validate([
        //     'description' => 'required',
        //     'item' => 'required',
            
        // ]);

        // $form = new Inventory;
        // $form->description = $inventories['description'];
        // $form->item = $inventories['item'];
        // $form->update($inventories);

        $request->validate([
            'description' => 'required',
            'item' => 'required'
        
        ]);
    
        $data = Inventory::findOrFail($id);
        $data->update($request->all());

        // return response()->json(['redirect' => route('inventory.index')]);
    
        // return redirect('inventory')->json(['message' => 'Data updated successfully']);

         return redirect('inventory')->with('flash_message', 'Inventory Updated!');
        
    }
  
    public function destroy($id)
    {
        Inventory::destroy($id);
        return redirect('inventory')->with('flash_message', 'Student deleted!');  
    }
}

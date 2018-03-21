<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\FAcades\Input;
use App\Product;

class FileController extends Controller 
{
    public function index(Request $request)
    {

        //If we have q in the request, we assume the user is searching 
        // for a specific name or sopname, therefore let's fetch and 
        // display related results

           switch (request()->has('q')) {
            case true:

                $product  = new Product; 

                $products = $product->where('name',request()->get('q'))
                                     ->orWhere('sopName',request()->get('q'));

                break;
            
            default:
                $products = new Product;
                break;
        }
        
        $products = $products->orderBy('id','DESC')
                             ->paginate(5);

        return view('files.index',compact('products'))
           ->with('i', ($request->input('page', 1) - 1) * 5);
    }
            
    
    public function create(){

        return view('files.create');
    }
    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'sopName' => 'required',
            'product_file' => 'required|file|mimes:jpeg,csv,docx,png,jpg,gif,svg|max:2048',
        ]);
        $products = new Product($request->input()) ;
     
         if($file = $request->hasFile('product_file')) {
            
            $file = $request->file('product_file') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/files/' ;
            $file->move($destinationPath,$fileName);
            $products->product_file = $fileName ;
        }
        $products->save() ;
         return redirect()->route('upload-files.index')
                        ->with('success','You have successfully uploaded your files');
    }
    
    public function edit($id)
    {
       $product = Product::find($id);
       return view('files.edit',compact('product'));
    }
    public function update($id)
    {
        $product = Product::find($id);
        $product->No  = request()->get('id');
        $product->Name = request()->get('name');
        $product->SopName  = request()->get('sopName');
        $product->save();

        return $this->index();
    }
    public function delete($id)
    {
        
        $product = Product::find($id);
        $product->delete();
        return $this->index();
    }
}
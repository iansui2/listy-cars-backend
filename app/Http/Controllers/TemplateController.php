<?php

namespace App\Http\Controllers;
 
use App\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class TemplateController extends Controller{

    public function index(){ 
        $Templates = Template::all(); 
        return response()->json($Templates);
    }
 
    public function getTemplate($id){
        $Template = Template::find($id);
        return response()->json($Template);
    }
 
    public function createTemplate(Request $request){
        $Template = Template::create($request->all());
        return response()->json($Template);
    }
 
    public function deleteTemplate ($id){
        $Template= Template::find($id);
        $Template->delete();
        return response()->json($Template);
    }
 
    public function updateTemplate (Request $request, $id){
        $Template = Template::find($id);

        $data = array(
            'name' => $request->name !== null ? $request->name : $Template->name,
            'brand' => $request->brand !== null ? $request->brand : $Template->brand,
            'year' => $request->year !== null ? $request->year : $Template->year,
            'description' => $request->description !== null ? $request->description : $Template->description,
            'image' => $request->image !== null ? $request->image : $Template->image
        );

        $query = Template::where('id', $id)->update($data);
 
        return response()->json($query);
    }
}

?>
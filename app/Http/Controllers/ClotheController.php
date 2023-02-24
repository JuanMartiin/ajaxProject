<?php

namespace App\Http\Controllers;

use App\Models\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClotheController extends Controller
{
    
    const ITEMS_PER_PAGE = 4;
    const ORDER_BY = 'clothe.name';
    const ORDER_TYPE = 'asc';
    
     
    public function store(Request $request)
    {
        try{
            $clothe = new Clothe();
            $clothe->name = $request->name;
            $clothe->price = $request->price;
            
            $clothe->save();
            return redirect('/');
        }catch(\Exception $e){
            return back()
                ->withInput()
                ->withErrors(['message' => 'An unexpected error occurred while creating.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clothe  $clothe
     * @return \Illuminate\Http\Response
     */
    public function show(Clothe $clothe)
    {
        return view('clothe.show', ['clothe' => $clothe]);
    }
    
    
    
    public function fetchData(Request $request)
    {
        $q = $request->input('search');
        $orderby = $request->input('orderby');
        $ordertype = $request->input('ordertype');
        
        
        
        //construcción de la consulta
        $clothe = \DB::table('clothe')->select('clothe.*');

        //agregando condición a la consulta, si la hay
        if($q != '') {
            $clothe = $clothe->where('clothe.name', 'like', '%' . $q . '%');
        }
        
        //agregando el orden a la consulta
        if($orderby && $orderby != ""){
            $clothe = $clothe->orderBy($ordertype ,$orderby);
        }else if($orderby != self::ORDER_BY) {
            $clothe = $clothe->orderBy(self::ORDER_BY, self::ORDER_TYPE);
        }
        
        
        //ejecutar la consulta, usando la paginación
        $clothes = $clothe->paginate(self::ITEMS_PER_PAGE)->withQueryString();
        
        return response()->json([
                                    'csrf' => csrf_token(),
                                    'url' => url('/'),
                                    'clothes' => $clothes,
                                    'img' => asset('storage/images/'),
                                ], 200);
        
    }
    
    
    function index(Request $request) {
        return view('clothe.index');
    }
    
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Clothe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClotheController extends Controller
{
    
    const ITEMS_PER_PAGE = 4;
    const ORDER_BY = 'clothe.name';
    const ORDER_TYPE = 'asc';
    const ORDER_CATEGORY = 'all';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //consulta, ordenación y tipo de ordenación
        $q = $request->input('q', '');
        $orderby = $this->getOrderBy($request->input('orderby'));
        $ordertype = $this->getOrderType($request->input('ordertype'));
        
        //construcción de la consulta
        $clothe = \DB::table('clothe')
                    ->select('clothe.*');

        //agregando condición a la consulta, si la hay
        if($q != '') {
            $clothe = $clothe->where('clothe.name', 'like', '%' . $q . '%');

        }

        //agregando el orden a la consulta
        $clothe = $clothe->orderBy($orderby, $ordertype);
        if($orderby != self::ORDER_BY) {
            $clothe = $clothe->orderBy(self::ORDER_BY, self::ORDER_TYPE);
        }

        //ejecutar la consulta, usando la paginación
        $clothes = $clothe->paginate(self::ITEMS_PER_PAGE)->withQueryString();
        
        //dd($yates);
        return view('clothe.index', ['order'  => $this->getOrderUrls($orderby, $ordertype, $q, 'clothe.index'),
                                    'q'     => $q,
                                    'url'   => url('clothe'),
                                    'clothes' => $clothes]);
        
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     
     
    public function store(Request $request)
    {
        try{
            $clothe = new Clothe();
            $clothe->name = $request->name;
            $clothe->price = $request->price;
            if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $archivo = $request->file('thumbnail');
                $path = $archivo->getRealPath();
                $imagen = file_get_contents($path);
                $clothe->thumbnail = base64_encode($imagen);
            }else{
                return back()
                    ->withInput()
                    ->withErrors(['message' => 'An unexpected error occurred whit the thumbnail']);
            }
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

    private function getOrder($orderArray, $order, $default) {
        $value = array_search($order, $orderArray);
        if(!$value) {
            return $default;
        }
        return $value;
    }

    private function getOrderBy($order) {
        return $this->getOrder($this->getOrderBys(), $order, self::ORDER_BY);
    }

    private function getOrderBys() {
        return [
            'clothes.id'           => 'b1',
            'clothes.name'       => 'b2',
            'price'       => 'b3',
        ];
    }

    private function getOrderType($order) {
        return $this->getOrder($this->getOrderTypes(), $order, self::ORDER_TYPE);
    }

    private function getOrderTypes() {
        return [
            'asc'  => 't1',
            'desc' => 't2',
        ];
    }
    
    private function getOrderCategory($order) {
        return $this->getOrder($this->getOrderCategories(), $order, self::ORDER_CATEGORY);
    }
    
    
    private function getOrderUrls($oBy, $oType, $q, $route) {
        $urls = [];
        $orderBys = $this->getOrderBys();
        $orderTypes = $this->getOrderTypes();
        foreach($orderBys as $indexBy => $by) {
            foreach($orderTypes as $indexType => $type) {
                if($oBy == $indexBy && $oType == $indexType) {
                    $urls[$indexBy][$indexType] = url()->full() . '#';
                } else {
                    $urls[$indexBy][$indexType] = route($route, [
                                                            'orderby'   => $by,
                                                            'ordertype' => $type,
                                                            'q'         => $q]);
                }
            }
        }
        return $urls;
    }
}

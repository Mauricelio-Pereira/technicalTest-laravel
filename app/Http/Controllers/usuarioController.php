<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class usuarioController extends Controller
{
    public function index(){
        //Obter Api
        $api = Http::get('https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0'); 

        //converter api que está json para Array
        $apiArray = $api->json();

        //paginação
        $paginacao = $this->paginacao($apiArray['users'], 10, null, ['path' => route('index')]);

        return view('usuario', ['dadosApi' => $apiArray, 'paginacao' => $paginacao]);
    }

    public function paginacao($items, $perPage = 10, $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}

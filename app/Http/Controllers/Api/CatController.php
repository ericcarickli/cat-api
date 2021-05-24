<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cat;
use App\Repository\Cats;

class CatController extends Controller
{
    private $cat;

    public function __construct(Cat $cat)
    {

        $this->cat = $cat;
    }

    public function index()
    {
        $data = $this->cat->all();
        $quant = $data->count();
        if ($quant == 0) {
            return response()->json(['msg' => 'Banco de dados vazio']);
        }
        else {
            $cats =  new Cats();
            $cat = $cats->getAll();
            return $cat;
        }

    }


    public function store(Request $request)
    {
        $response = Http::get('https://api.thecatapi.com/v1/breeds?attach_breed=0');
        $responsej = json_decode($response);

        foreach ($responsej as $cat) {
            $array = (array) $cat;
            $this->cat->create($array);
        }

        return response()->json(['msg' => 'Dados do TheCatApi adicionado com sucesso!']);
    }

    public function storeManually(Request $request)
    {
        $catData = $request->all();
        $this->cat->create($catData);
        return response()->json(['msg' => 'Breed adicionado com sucesso!']);
    }


    public function show(Cat $id)
    {
        $data  = ['data' => $id];
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $catData = $request->all();
        $cat = $this->cat->find($id);
        $cat->update($catData);
        return response()->json(['msg' => 'Breed editado com sucesso']);
    }

    public function destroy(Cat $id)
    {
        $id->delete();
        return response()->json(['msg' => 'Breed:' . $id->name . ' deletado com sucesso']);
    }
}

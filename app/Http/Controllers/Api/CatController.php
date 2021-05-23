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

            $response = Http::get('https://api.thecatapi.com/v1/breeds?attach_breed=0');
            $responsej = json_decode($response);

            foreach ($responsej as $cat) {
                echo $cat->id;
                echo"<hr>";
                echo $cat->name;
                echo"<hr>";
                echo $cat->temperament;
                echo"<hr>";
            }
            return;
        }
        else {
            $cats =  new Cats();
            $cat = $cats->getAll();
            return $cat;
        }

        // $data  = ['data' => $this->cat->all()];
        // return response()->json($data);
    }


    public function store(Request $request)
    {
        $response = Http::get('https://api.thecatapi.com/v1/breeds?attach_breed=0');
        $responsej = json_decode($response);

        foreach ($responsej as $cat) {
            $array = (array) $cat;
            $this->cat->create($array);
        }

        // $catData = $request->all();
        // $this->cat->create($catData);
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
    }


    public function destroy(Cat $id)
    {
        $id->delete();
        return response()->json(['data' => ['msg' => 'Seed:' . $id->name . ' deletado com sucesso']]);
    }
}

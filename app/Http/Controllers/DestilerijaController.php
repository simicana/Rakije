<?php

namespace App\Http\Controllers;

use App\Http\Resources\DestilerijaResurs;
use App\Models\Destilerija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestilerijaController extends BaseController
{
    public function index()
    {
        $destilerije = Destilerija::all();
        return $this->uspesno(DestilerijaResurs::collection($destilerije), 'Vracene su sve destilerije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'destilerija' => 'required',
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $destilerija = Destilerija::create($input);

        return $this->uspesno(new DestilerijaResurs($destilerija), 'Nova destilerija je kreirana.');
    }


    public function show($id)
    {
        $destilerija = Destilerija::find($id);
        if (is_null($destilerija)) {
            return $this->greska('Destilerija sa zadatim id-em ne postoji.');
        }
        return $this->uspesno(new DestilerijaResurs($destilerija), 'Destilerija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $destilerija = Destilerija::find($id);
        if (is_null($destilerija)) {
            return $this->greska('Destilerija sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'destilerija' => 'required',
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $destilerija->destilerija = $input['destilerija'];
        $destilerija->save();

        return $this->uspesno(new DestilerijaResurs($destilerija), 'Destilerija je azurirana.');
    }

    public function destroy($id)
    {
        $destilerija = Destilerija::find($id);
        if (is_null($destilerija)) {
            return $this->greska('Destilerija sa zadatim id-em ne postoji.');
        }
        $destilerija->delete();
        return $this->uspesno([], 'Destilerija je obrisana.');
    }
}

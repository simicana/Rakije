<?php

namespace App\Http\Controllers;

use App\Http\Resources\RakijaResurs;
use App\Models\Rakija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RakijaController extends BaseController
{
    public function index()
    {
        $rakije = Rakija::all();
        return $this->uspesno(RakijaResurs::collection($rakije), 'Vracene su sve rakije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'ambalaza' => 'required',
            'vrstaId' => 'required',
            'destilerijaId' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $rakija = Rakija::create($input);

        return $this->uspesno(new RakijaResurs($rakija), 'Nova rakija je kreirana.');
    }


    public function show($id)
    {
        $rakija = Rakija::find($id);
        if (is_null($rakija)) {
            return $this->greska('Rakija sa zadatim id-em ne postoji.');
        }
        return $this->uspesno(new RakijaResurs($rakija), 'Rakija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $rakija = Rakija::find($id);
        if (is_null($rakija)) {
            return $this->greska('Rakija sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'ambalaza' => 'required',
            'vrstaId' => 'required',
            'destilerijaId' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $rakija->naziv = $input['naziv'];
        $rakija->ambalaza = $input['ambalaza'];
        $rakija->vrstaId = $input['vrstaId'];
        $rakija->destilerijaId = $input['destilerijaId'];
        $rakija->save();

        return $this->uspesno(new RakijaResurs($rakija), 'Rakija je azurirana.');
    }

    public function destroy($id)
    {
        $rakija = Rakija::find($id);
        if (is_null($rakija)) {
            return $this->greska('Rakija sa zadatim id-em ne postoji.');
        }

        $rakija->delete();
        return $this->uspesno([], 'Rakija je obrisana.');
    }
}

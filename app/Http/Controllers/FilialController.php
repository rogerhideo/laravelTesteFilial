<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filial as Filial;
use App\Http\Resources\Filial as FilialResource;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $userId ) {
//        $filiais = Filial::paginate(15);
        $filiais = Filial::where('user_id', $userId)->paginate(15);
        return FilialResource::collection($filiais);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( ) { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filial = new Filial;
        $filial->nome = $request->input('nome');
        $filial->cidade = $request->input('cidade');
        $filial->latitude = $request->input('latitude');
        $filial->longitude = $request->input('longitude');
        $filial->user_id = $request->input('user_id');

        if( $filial->save() ){
            return new FilialResource( $filial );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filial = Filial::findOrFail( $id );
        return new FilialResource( $filial );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filial = Filial::findOrFail( $request->id );
        $filial->nome = $request->input('nome');
        $filial->cidade = $request->input('cidade');
        $filial->latitude = $request->input('latitude');
        $filial->longitude = $request->input('longitude');

        if( $filial->save() ){
            return new FilialResource( $filial );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filial = Filial::findOrFail( $id );
        if( $filial->delete() ){
            return new FilialResource( $filial );
        }
    }
}

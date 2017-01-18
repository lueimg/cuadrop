<?php

class SedeController extends \BaseController
{

    /**
     * cargar sedes, mantenimiento
     * POST /sede/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $sedes = Sede::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$sedes));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /sede/listar
     *
     * @return Response
     */
    public function postListar()
    {
        if ( Request::ajax() ) {
            $a      = new Sede;
            $listar = Array();
            $listar = $a->getSede();

            return Response::json(
                array(
                    'rst'   => 1,
                    'datos' => $listar
                )
            );
        }
    }

    public function postListar2()
    {
        if ( Request::ajax() ) {
            $a      = new Sede;
            $listar = Array();
            $listar = $a->getSede2();

            return Response::json(
                array(
                    'rst'   => 1,
                    'datos' => $listar
                )
            );
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /sede/crear
     *
     * @return Response
     */
    public function postCrear()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required.'|'.$regex,
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
            );

            $validator = Validator::make(Input::all(), $reglas, $mensaje);

            if ( $validator->fails() ) {
                return Response::json(
                    array(
                    'rst'=>2,
                    'msj'=>$validator->messages(),
                    )
                );
            }

            $sedes = new Sede;
            $sedes->nombre = Input::get('nombre');
            $sedes->estado = Input::get('estado');
            $sedes->usuario_created_at = Auth::user()->id;
            $sedes->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'sede_id'=>$sedes->id,
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /sede/editar
     *
     * @return Response
     */
    public function postEditar()
    {
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required.'|'.$regex,
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
            );

            $validator = Validator::make(Input::all(), $reglas, $mensaje);

            if ( $validator->fails() ) {
                return Response::json(
                    array(
                    'rst'=>2,
                    'msj'=>$validator->messages(),
                    )
                );
            }

            $sedeId = Input::get('id');
            $sedes = Sede::find($sedeId);
            $sedes->nombre = Input::get('nombre');
            $sedes->estado = Input::get('estado');
            $sedes->usuario_updated_at = Auth::user()->id;
            $sedes->save();
            if (Input::get('estado') == 0) {
                DB::table('sede_cargo_persona')
                    ->where('sede_id','=',$sedeId)
                    ->update(
                        array(
                            'estado' => 0,
                            'usuario_updated_at' => Auth::user()->id
                        ));
            }
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );
        }
    }

    /**
     * Changed the specified resource from storage.
     * POST /sede/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $sedeId = Input::get('id');
            $sede = Sede::find($sedeId);
            $sede->usuario_updated_at = Auth::user()->id;
            $sede->estado = Input::get('estado');
            $sede->save();
            if (Input::get('estado') == 0) {
                DB::table('sede_cargo_persona')
                    ->where('sede_id','=',$sedeId)
                    ->update(
                            array(
                                'estado' => 0,
                                'usuario_updated_at' => Auth::user()->id
                                )
                        );
            }
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

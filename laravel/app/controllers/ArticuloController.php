<?php

class ArticuloController extends \BaseController
{

    /**
     * cargar sedes, mantenimiento
     * POST /articulo/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $sedes = Articulo::getCargar();
            $tipoArticulo = TipoArticulo::get(['estado',1]);
            return Response::json(['rst'=>1,'datos'=>$sedes,'tipoarticulo'=>$tipoArticulo]);
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /articulo/crear
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

            $sedes = new Articulo;
            $sedes->nombre = Input::get('nombre');
            $sedes->tipo_articulo = Input::get('tipo_articulo');
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
     * POST /articulo/editar
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
            $sedes = Articulo::find($sedeId);
            $sedes->nombre = Input::get('nombre');
            $sedes->tipo_articulo = Input::get('tipo_articulo');
            $sedes->estado = Input::get('estado');
            $sedes->usuario_updated_at = Auth::user()->id;
            $sedes->save();
            
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
     * POST /articulo/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $sedeId = Input::get('id');
            $sede = Articulo::find($sedeId);
            $sede->usuario_updated_at = Auth::user()->id;
            $sede->estado = Input::get('estado');
            $sede->save();
            
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

<?php

class ServicioController extends \BaseController
{

    /**
     * cargar servicios, mantenimiento
     * POST /servicio/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $servicios = Servicio::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$servicios));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /servicio/crear
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

            $servicios = new Servicio;
            $servicios->nombre = Input::get('nombre');
            $servicios->estado = Input::get('estado');
            $servicios->usuario_created_at = Auth::user()->id;
            $servicios->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'servicios_id'=>$servicios->id,
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /servicio/editar
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

            $servicioId = Input::get('id');
            $servicios = Servicio::find($servicioId);
            $servicios->nombre = Input::get('nombre');
            $servicios->estado = Input::get('estado');
            $servicios->usuario_updated_at = Auth::user()->id;
            $servicios->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                'servicios_id'=>$servicios->id,
                )
            );
        }
    }

    /**
     * Changed the specified resource from storage.
     * POST /servicio/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $servicioId = Input::get('id');
            $servicio = Servicio::find($servicioId);
            $servicio->usuario_updated_at = Auth::user()->id;
            $servicio->estado = Input::get('estado');
            $servicio->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

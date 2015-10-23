<?php

class CarreraController extends \BaseController
{

    /**
     * cargar carreras, mantenimiento
     * POST /carrera/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $carreras = Carrera::getCarrera();
            return Response::json(array('rst'=>1,'datos'=>$carreras));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /carrera/listar
     *
     * @return Response
     */
    public function postListar()
    {
        if ( Request::ajax() ) {
            $a      = new Carrera;
            $listar = Array();
            $listar = $a->getCarrera();

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
     * POST /carrera/crear
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

            $carreras = new Carrera;
            $carreras->nombre = Input::get('nombre');
            $carreras->tipo_carrera_id = Input::get('tipo_carrera');
            $carreras->estado = Input::get('estado');
            $carreras->usuario_created_at = Auth::user()->id;
            $carreras->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'carrera_id'=>$carreras->id,
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /carrera/editar
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

            $carreraId = Input::get('id');
            $carreras = Carrera::find($carreraId);
            $carreras->nombre = Input::get('nombre');
            $carreras->tipo_carrera_id = Input::get('tipo_carrera');
            $carreras->estado = Input::get('estado');
            $carreras->usuario_updated_at = Auth::user()->id;
            $carreras->save();
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
     * POST /carrera/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $carreraId = Input::get('id');
            $carrera = Carrera::find($carreraId);
            $carrera->usuario_updated_at = Auth::user()->id;
            $carrera->estado = Input::get('estado');
            $carrera->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

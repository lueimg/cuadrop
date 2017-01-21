<?php

class LicenciaController extends \BaseController
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
            $licencias = Licencia::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$licencias));
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
            $a      = new Licencia;
            $listar = Array();
            $listar = $a->getLicencia();

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

            $licencias = new Licencia;
            $licencias->nombre = Input::get('nombre');
            $licencias->estado = Input::get('estado');
            $licencias->usuario_created_at = Auth::user()->id;
            $licencias->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'sede_id'=>$licencias->id,
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

            $licenciaId = Input::get('id');
            $licencias = Licencia::find($licenciaId);
            $licencias->nombre = Input::get('nombre');
            $licencias->estado = Input::get('estado');
            $licencias->usuario_updated_at = Auth::user()->id;
            $licencias->save();
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
            $licenciaId = Input::get('id');
            $licencia = Licencia::find($licenciaId);
            $licencia->usuario_updated_at = Auth::user()->id;
            $licencia->estado = Input::get('estado');
            $licencia->save();
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

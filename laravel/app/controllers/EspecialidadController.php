<?php

class EspecialidadController extends \BaseController
{

    /**
     * cargar sedes, mantenimiento
     * POST /sede/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
             if ( Request::ajax() ) {
            $a      = new Especialidad;
            $listar = Array();
            $listar = $a->getCargar();

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
     * POST /sede/listar
     *
     * @return Response
     */
    public function postListar()
    {
        if ( Request::ajax() ) {
            $a      = new Especialidad;
            $listar = Array();
            $listar = $a->getEspecialidad();

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

            $especialidad = new Especialidad;
            $especialidad->nombre = Input::get('nombre');
            $especialidad->carrera_id = Input::get('carrera');
            $especialidad->estado = Input::get('estado');
            $especialidad->usuario_created_at = Auth::user()->id;
            $especialidad->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
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

            $especialidadId = Input::get('id');
            $especialidad = Especialidad::find($especialidadId);
            $especialidad->nombre = Input::get('nombre');
            $especialidad->carrera_id = Input::get('carrera');
            $especialidad->estado = Input::get('estado');
            $especialidad->usuario_updated_at = Auth::user()->id;
            $especialidad->save();

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
            $especialidadId = Input::get('id'); 
            $especialidad = Especialidad::find($especialidadId);
            $especialidad->usuario_updated_at = Auth::user()->id;
            $especialidad->estado = Input::get('estado');
            $especialidad->save();
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

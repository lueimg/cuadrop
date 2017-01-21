<?php

class MunicipalidadController extends \BaseController
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
            $municipalidades = Municipalidad::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$municipalidades));
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
            $a      = new Municipalidad;
            $listar = Array();
            $listar = $a->getMunicipalidad();

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

            $municipalidades = new Municipalidad;
            $municipalidades->nombre = Input::get('nombre');
            $municipalidades->estado = Input::get('estado');
            $municipalidades->usuario_created_at = Auth::user()->id;
            $municipalidades->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'sede_id'=>$municipalidades->id,
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

            $municipalidadId = Input::get('id');
            $municipalidades = Municipalidad::find($municipalidadId);
            $municipalidades->nombre = Input::get('nombre');
            $municipalidades->estado = Input::get('estado');
            $municipalidades->usuario_updated_at = Auth::user()->id;
            $municipalidades->save();
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
            $municipalidadId = Input::get('id');
            $municipalidad = Municipalidad::find($municipalidadId);
            $municipalidad->usuario_updated_at = Auth::user()->id;
            $municipalidad->estado = Input::get('estado');
            $municipalidad->save();
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

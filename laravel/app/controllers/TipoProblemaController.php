<?php

class TipoProblemaController extends \BaseController
{

    /**
     * cargar tipoproblema, mantenimiento
     * POST /tipoproblema/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $tipoproblema = TipoProblema::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$tipoproblema));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /tipoproblema/listar
     *
     * @return Response
     */
    public function postListar()
    {
        if ( Request::ajax() ) {
            $a      = new TipoProblema;
            $listar = Array();
            $listar = $a->getTipoProblema();

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
            $a      = new TipoProblema;
            $listar = Array();
            $listar = $a->getListar();

            return Response::json(
                array(
                    'rst'   => 1,
                    'datos' => $listar
                )
            );
        }
    }

    public function postListargrupo()
    {
        if ( Request::ajax() ) {
            $a      = new TipoProblema;
            $listar = Array();
            $listar = $a->getTipoProblemaGrupo();

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
     * POST /tipoproblema/crear
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
                'nombre' => $required,
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

            $tipoproblema = new TipoProblema;
            $tipoproblema->nombre = Input::get('nombre');
            $tipoproblema->estado = Input::get('estado');
            $tipoproblema->usuario_created_at = Auth::user()->id;
            $tipoproblema->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'tipoproblema_id'=>$tipoproblema->id,
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /tipoproblema/editar
     *
     * @return Response
     */
    public function postEditar()
    {
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required,
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

            $tipoproblemaId = Input::get('id');
            $tipoproblema = TipoProblema::find($tipoproblemaId);
            $tipoproblema->nombre = Input::get('nombre');
            $tipoproblema->estado = Input::get('estado');
            $tipoproblema->usuario_updated_at = Auth::user()->id;
            $tipoproblema->save();
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
     * POST /tipoproblema/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $tipoproblemaId = Input::get('id');
            $tipoproblema = TipoProblema::find($tipoproblemaId);
            $tipoproblema->usuario_updated_at = Auth::user()->id;
            $tipoproblema->estado = Input::get('estado');
            $tipoproblema->save();
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

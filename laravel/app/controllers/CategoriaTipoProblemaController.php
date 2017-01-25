<?php

class CategoriaTipoProblemaController extends \BaseController
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
            $a      = new CategoriaTipoProblema;
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
            $a      = new CategoriaTipoProblema;
            $listar = Array();
            $listar = $a->getCategoriaTipoProblema();

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

            $categoria = new CategoriaTipoProblema;
            $categoria->nombre = Input::get('nombre');
            $categoria->tipo_problema_id = Input::get('tipo_problema');
            $categoria->estado = Input::get('estado');
            $categoria->usuario_created_at = Auth::user()->id;
            $categoria->save();

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

            $categoriaId = Input::get('id');
            $categoria = CategoriaTipoProblema::find($categoriaId);
            $categoria->nombre = Input::get('nombre');
            $categoria->tipo_problema_id = Input::get('tipo_problema');
            $categoria->estado = Input::get('estado');
            $categoria->usuario_updated_at = Auth::user()->id;
            $categoria->save();

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
            $categoriaId = Input::get('id'); 
            $categoria = CategoriaTipoProblema::find($categoriaId);
            $categoria->usuario_updated_at = Auth::user()->id;
            $categoria->estado = Input::get('estado');
            $categoria->save();
            if (Input::get('estado') == 0) {
                DB::table('sede_cargo_persona')
                    ->where('sede_id','=',$categoriaId)
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

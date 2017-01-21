<?php

class SemestreController extends \BaseController
{

    /**
     * cargar semestres, mantenimiento
     * POST /semestre/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $semestres = Semestre::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$semestres));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /semestre/crear
     *
     * @return Response
     */
    public function postCrear()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $regex='regex:/^[0-9]{1,4}-([A-Za-z]{1,2})$/';
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

            $semestres = new Semestre;
            $semestres->nombre = Input::get('nombre');
            $semestres->estado = Input::get('estado');
            $semestres->usuario_created_at = Auth::user()->id;
            $semestres->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'semestres_id'=>$semestres->id,
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /semestre/editar
     *
     * @return Response
     */
    public function postEditar()
    {
        if ( Request::ajax() ) {
            $regex='regex:/^[0-9]{1,4}-([A-Za-z]{1,2})$/';
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

            $semestreId = Input::get('id');
            $semestres = Semestre::find($semestreId);
            $semestres->nombre = Input::get('nombre');
            $semestres->estado = Input::get('estado');
            $semestres->usuario_updated_at = Auth::user()->id;
            $semestres->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                'semestres_id'=>$semestres->id,
                )
            );
        }
    }

    /**
     * Changed the specified resource from storage.
     * POST /semestre/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $semestreId = Input::get('id');
            $semestre = Semestre::find($semestreId);
            $semestre->usuario_updated_at = Auth::user()->id;
            $semestre->estado = Input::get('estado');
            $semestre->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}

<?php

class InstitutoController extends \BaseController
{

    /**
     * cargar institutos, mantenimiento
     * POST /instituto/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            //consultar las carreras y los ciclos
            $carreras = Carrera::get(['estado',1]);
            $ciclos = Ciclo::get(['estado',1]);
            $modalidades = Modalidad::get();
            $institutos = Instituto::get(Input::all());
            return Response::json([
                'rst'=>1,
                'datos'=>$institutos,
                'modalidades'=>$modalidades,
                'carreras'=>$carreras,
                'ciclos'=>$ciclos
            ]);
        }
    }
    /**
     * cargar institutos, mantenimiento
     * POST /instituto/consultarcarrerasciclo
     *
     * @return Response
     */
    public function postConsultarcarrerasciclos()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $instituto = Instituto::find(Input::get('id'));
            $carreras = $instituto->carreras;
            $ciclos = $instituto->ciclos;
            return Response::json(['rst'=>1,'carreras'=>$carreras,'ciclos'=>$ciclos]);
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /instituto/listar
     *
     * @return Response
     */
    public function postListar()
    {
        if ( Request::ajax() ) {
            $a      = new Instituto;
            $listar = Array();
            $listar = $a->getInstituto();

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
     * POST /instituto/crear
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
                'modalidad_id' => $required.'|numeric',
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

            $instituto = new Instituto;
            $instituto->nombre = Input::get('nombre');
            $instituto->estado = Input::get('estado');
            $instituto->modalidad_id = Input::get('modalidad_id');
            $instituto->usuario_created_at = Auth::user()->id;
            $instituto->save();

            //guardar en carreras y ciclos
            if (Input::has('carreras')) {
                $instituto->carreras()->attach(Input::get('carreras'));
            }
            if (Input::has('ciclos')) {
                $instituto->ciclos()->attach(Input::get('ciclos'));
            }
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'instituto_id'=>$instituto->id,
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /instituto/editar
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
                'modalidad_id' => $required.'|numeric',
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

            $institutoId = Input::get('id');
            $instituto = Instituto::find($institutoId);
            $instituto->nombre = Input::get('nombre');
            $instituto->estado = Input::get('estado');
            $instituto->modalidad_id = Input::get('modalidad_id');
            $instituto->usuario_updated_at = Auth::user()->id;
            $instituto->save();

            //guardar en carreras y ciclos
            if (Input::has('carreras')) {
                $instituto->carreras()->sync(Input::get('carreras'));
            }
            if (Input::has('ciclos')) {
                $instituto->ciclos()->sync(Input::get('ciclos'));
            }
            if (Input::get('estado') == 0) {
                /*DB::table('sede_cargo_persona')
                    ->where('sede_id','=',$institutoId)
                    ->update(
                        array(
                            'estado' => 0,
                            'usuario_updated_at' => Auth::user()->id
                        ));*/
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
     * POST /instituto/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $institutoId = Input::get('id');
            $instituto = Instituto::find($institutoId);
            $instituto->usuario_updated_at = Auth::user()->id;
            $instituto->estado = Input::get('estado');
            $instituto->save();
            if (Input::get('estado') == 0) {
                /*DB::table('sede_cargo_persona')
                    ->where('sede_id','=',$institutoId)
                    ->update(
                            array(
                                'estado' => 0,
                                'usuario_updated_at' => Auth::user()->id
                                )
                        );*/
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

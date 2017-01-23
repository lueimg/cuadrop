<?php
use Cuadrop\Alumno\AlumnoRepoInterface;

class AlumnoController extends BaseController
{
    //protected $regex='required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
    protected $_rules = array(
        'paterno'   => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        'materno'   => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        'nombre'    => 'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
        'sexo'      => 'required|max:1',
        'email'     => 'required|email|unique:alumnos,email',
        'telefono'  => 'required|min:6'
    );
    protected $_mensaje= array(
        'required'    => ':attribute Es requerido',
        'regex'        => ':attribute Solo debe ser Texto',
        'exists'       => ':attribute ya existe',
    );
    protected $alumnoRepo;
    public function __construct(AlumnoRepoInterface $alumnoRepo)
    {
        $this->alumnoRepo = $alumnoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        if ( Request::ajax() ) {
            $alumnos = $this->alumnoRepo->getAlumno();
            return Response::json(array('rst'=>1,'datos'=>$alumnos));
        }
    }

    public function getPersona()
    {
        if ( Request::ajax() ) {
            $sql="  SELECT *
                    FROM personas
                    WHERE estado=1 ";
            $personas = DB::select($sql);
            return Response::json(array('rst'=>1,'datos'=>$personas));
        }
    }
    /**
     * nuevo alumno
     *
     * @return Response
     */
    public function postCreate()
    {
        $data = Input::all();// dd($data);
        $validator = Validator::make($data, $this->_rules, $this->_mensaje);
        if ( $validator->passes() ) {
            $alumno = $this->alumnoRepo->create($data);//$alumno->id
            $rst=1;
            $msj='Registro actualizado correctamente';
        } else {
            $rst=2;
            $msj=$validator->messages();
        }
        return Response::json(
                array(
                    'rst'=>$rst,
                    'msj'=>$msj,
                )
        );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $alumno = $this->alumnoRepo->findOrFail($id);
        return Response::json(array('rst'=>1,'datos'=>$alumno));
        //return View::make('admin/sections/show')->with('section', $alumno);
    }
    /**
     * actualizar alumno
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate()
    {
        $id = Input::get('id', '');
        $alumno = $this->alumnoRepo->findOrFail($id);
        $data = Input::all();
        $this->_rules['email']='required|email|unique:alumnos,email,'.$id;
        $validator = Validator::make($data, $this->_rules, $this->_mensaje);
        if ($validator->passes()) {
            $alumno = $this->alumnoRepo->update($alumno, $data);
            $rst=1;
            $msj='Registro actualizado correctamente';
        } else {
            $rst=2;
            $msj=$validator->messages();
        }
        return Response::json(
                array(
                    'rst'=>$rst,
                    'msj'=>$msj,
                )
        );
    }
    /**
     * Remove alumno
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->alumnoRepo->delete($id);
        return Response::json(array('rst'=>1,'msj'=>'Registro eliminado correctamente'));
        //return Redirect::route('admin.sections.index');
    }
}

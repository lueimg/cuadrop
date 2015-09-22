<?php
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{
    Route::resource('asunto', 'AsuntoController');
});

Route::group(array('before' => 'hash'), function()
{
    Route::controller('api', 'ApiController');
});
Route::get(
    '/', function () {
        return View::make('login');
    }
);

Route::get(
    'salir', function () {
        Auth::logout();

        return Redirect::to('/');
    }
);

Route::controller('check', 'LoginController');
Route::controller('imagen', 'ImagenController');
Route::controller('consulta', 'ConsultaController');

Route::get(
    '/{ruta}', array('before' => 'auth', function ($ruta) {
        if (Session::has('accesos')) {
            $accesos = Session::get('accesos');
            $menu = Session::get('menu');

            $val = explode("_", $ruta);
            $valores = array( 
                'valida_ruta_url' => $ruta,
                'menu' => $menu
            );
            if (count($val) == 2) {
                $dv = explode("=", $val[1]);
                $valores[$dv[0]] = $dv[1];
            }
            $rutaBD = substr($ruta, 6);
            //si tiene accesoo si accede al inicio o a misdatos
            if (in_array($rutaBD, $accesos) or 
                $rutaBD == 'inicio' or $rutaBD=='mantenimiento.misdatos') {
                return View::make($ruta)->with($valores);
            } else
                return Redirect::to('/admin.inicio');
        } else
            return Redirect::to('/');
        }
    )
);

Route::controller('actividad', 'ActividadController');
Route::controller('agenda', 'AgendaController');
Route::controller('area', 'AreaController');
Route::controller('bandeja', 'BandejaController');
Route::controller('cat_componente', 'CatComponenteController');
Route::controller('celula', 'CelulaController');
Route::controller('cupo', 'CupoController');
Route::controller('datos', 'DatosController');
Route::controller('dig_troba', 'DigTrobaController');
Route::controller('edificio_cableado', 'EdificioCableadoController');
Route::controller('empresa', 'EmpresaController');
Route::controller('estado', 'EstadoController');
Route::controller('feedback', 'FeedbackLiquidadoController');
Route::controller('geoplan', 'GeoplanController');
Route::controller('gestion', 'GestionController');
Route::controller('gestion_movimiento', 'GestionMovimientoController');
Route::controller('historico', 'HistoricoController');
Route::controller('horariotipo', 'HorarioTipoController');
Route::controller('language', 'LanguageController');
Route::controller('lista', 'ListaController');
Route::controller('mdf', 'MdfController');
Route::controller('modulo', 'ModuloController');
Route::controller('motivo', 'MotivoController');
Route::controller('nodo', 'NodoController');
Route::controller('obs_tipo', 'ObservacionTipoController');
Route::controller('officetrack', 'OfficetrackController');
Route::controller('perfil', 'PerfilController');
Route::controller('publicmap', 'PublicMapController');
Route::controller('quiebre', 'QuiebreController');
Route::controller('quiebregrupo', 'QuiebreGrupoController');
Route::controller('registro_manual', 'RegistroManualController');
Route::controller('reporte', 'ReporteController');
Route::controller('solucion', 'SolucionComercialController');
Route::controller('submodulo', 'SubModuloController');
Route::controller('submodulousuario', 'SubmoduloUsuarioController');
Route::controller('submotivo', 'SubMotivoController');
Route::controller('tecnico', 'TecnicoController');
Route::controller('tramo', 'TramoController');
Route::controller('ubigeo', 'UbigeoController');
Route::controller('upload', 'UploadController');
Route::controller('usuario', 'UsuarioController');
Route::controller('visorgps', 'VisorgpsController');
Route::controller('zonal', 'ZonalController');

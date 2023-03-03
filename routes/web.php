<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 //use Carbon\Carbon; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*Route::get('/time' , function(){$date =new Carbon;echo $date ; } );*/


Route::group(array('domain' => '127.0.0.1'), function () {

    Route::get('/', 'App\Http\Controllers\ControladorWebIndex@index');
    Route::get('/informacion', 'App\Http\Controllers\ControladorWebIndex@info');
    Route::get('/inscripciones', 'App\Http\Controllers\ControladorWebInscripcion@index');
    Route::post('/inscripciones', 'App\Http\Controllers\ControladorWebInscripcion@guardar');
    Route::get('/gracias', 'App\Http\Controllers\ControladorWebInscripcion@gracias');


    Route::get('/grupo/{id}', 'App\Http\Controllers\ControladorEscuadra@init');


    



 

    Route::get('/admin', 'App\Http\Controllers\ControladorHome@index');
    Route::post('/admin/patente/nuevo', 'App\Http\Controllers\ControladorPatente@guardar');

/* --------------------------------------------- */
/* CONTROLADOR LOGIN                           */
/* --------------------------------------------- */
    Route::get('/admin/login', 'App\Http\Controllers\ControladorLogin@index');
    Route::get('/admin/logout', 'App\Http\Controllers\ControladorLogin@logout');
    Route::post('/admin/logout', 'App\Http\Controllers\ControladorLogin@entrar');
    Route::post('/admin/login', 'App\Http\Controllers\ControladorLogin@entrar');

/* --------------------------------------------- */
/* CONTROLADOR RECUPERO CLAVE                    */
/* --------------------------------------------- */
    Route::get('/admin/recupero-clave', 'App\Http\Controllers\ControladorRecuperoClave@index');
    Route::post('/admin/recupero-clave', 'App\Http\Controllers\ControladorRecuperoClave@recuperar');

/* --------------------------------------------- */
/* CONTROLADOR PERMISO                           */
/* --------------------------------------------- */
    Route::get('/admin/usuarios/cargarGrillaFamiliaDisponibles', 'App\Http\Controllers\ControladorPermiso@cargarGrillaFamiliaDisponibles')->name('usuarios.cargarGrillaFamiliaDisponibles');
    Route::get('/admin/usuarios/cargarGrillaFamiliasDelUsuario', 'App\Http\Controllers\ControladorPermiso@cargarGrillaFamiliasDelUsuario')->name('usuarios.cargarGrillaFamiliasDelUsuario');
    Route::get('/admin/permisos', 'App\Http\Controllers\ControladorPermiso@index');
    Route::get('/admin/permisos/cargarGrilla', 'App\Http\Controllers\ControladorPermiso@cargarGrilla')->name('permiso.cargarGrilla');
    Route::get('/admin/permiso/nuevo', 'App\Http\Controllers\ControladorPermiso@nuevo');
    Route::get('/admin/permiso/cargarGrillaPatentesPorFamilia', 'App\Http\Controllers\ControladorPermiso@cargarGrillaPatentesPorFamilia')->name('permiso.cargarGrillaPatentesPorFamilia');
    Route::get('/admin/permiso/cargarGrillaPatentesDisponibles', 'App\Http\Controllers\ControladorPermiso@cargarGrillaPatentesDisponibles')->name('permiso.cargarGrillaPatentesDisponibles');
    Route::get('/admin/permiso/{idpermiso}', 'App\Http\Controllers\ControladorPermiso@editar');
    Route::post('/admin/permiso/{idpermiso}', 'App\Http\Controllers\ControladorPermiso@guardar');

/* --------------------------------------------- */
/* CONTROLADOR GRUPO                             */
/* --------------------------------------------- */
    Route::get('/admin/grupos', 'App\Http\Controllers\ControladorGrupo@index');
    Route::get('/admin/usuarios/cargarGrillaGruposDelUsuario', 'App\Http\Controllers\ControladorGrupo@cargarGrillaGruposDelUsuario')->name('usuarios.cargarGrillaGruposDelUsuario'); //otra cosa
    Route::get('/admin/usuarios/cargarGrillaGruposDisponibles', 'App\Http\Controllers\ControladorGrupo@cargarGrillaGruposDisponibles')->name('usuarios.cargarGrillaGruposDisponibles'); //otra cosa
    Route::get('/admin/grupos/cargarGrilla', 'App\Http\Controllers\ControladorGrupo@cargarGrilla')->name('grupo.cargarGrilla');
    Route::get('/admin/grupo/nuevo', 'App\Http\Controllers\ControladorGrupo@nuevo');
    Route::get('/admin/grupo/setearGrupo', 'App\Http\Controllers\ControladorGrupo@setearGrupo');
    Route::post('/admin/grupo/nuevo', 'App\Http\Controllers\ControladorGrupo@guardar');
    Route::get('/admin/grupo/{idgrupo}', 'App\Http\Controllers\ControladorGrupo@editar');
    Route::post('/admin/grupo/{idgrupo}', 'App\Http\Controllers\ControladorGrupo@guardar');

/* --------------------------------------------- */
/* CONTROLADOR USUARIO                           */
/* --------------------------------------------- */
    Route::get('/admin/usuarios', 'App\Http\Controllers\ControladorUsuario@index');
    Route::get('/admin/usuarios/nuevo', 'App\Http\Controllers\ControladorUsuario@nuevo');
    Route::post('/admin/usuarios/nuevo', 'App\Http\Controllers\ControladorUsuario@guardar');
    Route::post('/admin/usuarios/{usuario}', 'App\Http\Controllers\ControladorUsuario@guardar');
    Route::get('/admin/usuarios/cargarGrilla', 'App\Http\Controllers\ControladorUsuario@cargarGrilla')->name('usuarios.cargarGrilla');
    Route::get('/admin/usuarios/buscarUsuario', 'App\Http\Controllers\ControladorUsuario@buscarUsuario');
    Route::get('/admin/usuarios/{usuario}', 'App\Http\Controllers\ControladorUsuario@editar');

/* --------------------------------------------- */
/* CONTROLADOR MENU                             */
/* --------------------------------------------- */
    Route::get('/admin/sistema/menu', 'App\Http\Controllers\ControladorMenu@index');
    Route::get('/admin/sistema/menu/nuevo', 'App\Http\Controllers\ControladorMenu@nuevo');
    Route::post('/admin/sistema/menu/nuevo', 'App\Http\Controllers\ControladorMenu@guardar');
    Route::get('/admin/sistema/menu/cargarGrilla', 'App\Http\Controllers\ControladorMenu@cargarGrilla')->name('menu.cargarGrilla');
    Route::get('/admin/sistema/menu/eliminar', 'App\Http\Controllers\ControladorMenu@eliminar');
    Route::get('/admin/sistema/menu/{id}', 'App\Http\Controllers\ControladorMenu@editar');
    Route::post('/admin/sistema/menu/{id}', 'App\Http\Controllers\ControladorMenu@guardar');



/* --------------------------------------------- */
/* CONTROLADOR PATENTES                          */
/* --------------------------------------------- */
Route::get('/admin/patentes', 'App\Http\Controllers\ControladorPatente@index');
Route::get('/admin/patente/nuevo', 'App\Http\Controllers\ControladorPatente@nuevo');
Route::post('/admin/patente/nuevo', 'App\Http\Controllers\ControladorPatente@guardar');
Route::get('/admin/patente/cargarGrilla', 'App\Http\Controllers\ControladorPatente@cargarGrilla')->name('patente.cargarGrilla');
Route::get('/admin/patente/eliminar', 'App\Http\Controllers\ControladorPatente@eliminar');
Route::get('/admin/patente/nuevo/{id}', 'App\Http\Controllers\ControladorPatente@editar');
Route::post('/admin/patente/nuevo/{id}', 'App\Http\Controllers\ControladorPatente@guardar');

/* --------------------------------------------- */
/* CONTROLADOR Clasificacion                     */
/* --------------------------------------------- */

Route::get('/admin/clasificacion', 'App\Http\Controllers\ControladorClasificacion@index');
Route::post('/admin/clasificacion', 'App\Http\Controllers\ControladorClasificacion@guardar');

Route::get('/admin/clasificacion/{id}', 'App\Http\Controllers\ControladorClasificacion@update');
Route::post('/admin/clasificacion/{id}', 'App\Http\Controllers\ControladorClasificacion@guardar');
Route::get('/admin/clasificacion/eliminar/{id}', 'App\Http\Controllers\ControladorClasificacion@eliminar');

Route::get('/admin/lista/clacificacion', 'App\Http\Controllers\ControladorClasificacion@lista');
Route::get('/admin/lista/clacificacion/cargarGrilla', 'App\Http\Controllers\ControladorClasificacion@cargarGrilla')->name('clacificacion.cargarGrilla');

/* --------------------------------------------- */
/* CONTROLADOR escuadra                      */
/* --------------------------------------------- */
Route::get('/admin/escuadra', 'App\Http\Controllers\ControladorEscuadra@index');
Route::post('/admin/escuadra', 'App\Http\Controllers\ControladorEscuadra@guardar');

Route::get('/admin/escuadra/{id}', 'App\Http\Controllers\ControladorEscuadra@update');
Route::post('/admin/escuadra/{id}', 'App\Http\Controllers\ControladorEscuadra@guardar');
Route::get('/admin/escuadra/eliminar/{id}', 'App\Http\Controllers\ControladorEscuadra@eliminar');




Route::get('/admin/lista/escuadras', 'App\Http\Controllers\ControladorEscuadra@lista');
Route::get('/admin/lista/escuadras/cargarGrilla', 'App\Http\Controllers\ControladorEscuadra@cargarGrilla' )->name('escuadra.cargarGrilla');
/* --------------------------------------------- */
/* CONTROLADOR PROYECTOS                         */
/* --------------------------------------------- */});
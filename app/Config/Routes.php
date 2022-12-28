<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


$routes->post('curso', 'Cursos::create');
$routes->get('cursos/(:num)', 'Cursos::getall/$1');
$routes->get('cursos-search/(:any)', 'Cursos::getsearch/$1');
$routes->get('cursos-one/(:num)', 'Cursos::getone/$1');
$routes->get('cursos-delete/(:num)', 'Cursos::delete/$1');

$routes->get('login/(:any)/(:any)', 'Usuariologin::login/$1/$2');
$routes->get('verificar-clave/(:num)/(:any)', 'Usuariologin::verificarclavecorrecta/$1/$2');
$routes->post('clave-update', 'Usuariologin::updateclave');

$routes->get('docente/(:num)', 'Docentes::getone/$1');

$routes->get('estudiante/(:num)', 'Estudiantes::getone/$1');
$routes->post('estudiante-update', 'Estudiantes::update');

$routes->post('clase', 'Clases::create');
$routes->get('clases/(:num)', 'Clases::getall/$1');
$routes->get('clase-one/(:num)', 'Clases::getone/$1');

$routes->post('programa', 'Programa::create');
$routes->get('programas/(:num)', 'Programa::getall/$1');
$routes->get('programas-codigo/(:num)', 'Programa::getallprogramacodigo/$1');
$routes->get('programa-one/(:num)', 'Programa::getone/$1');
$routes->get('programas-delete/(:num)', 'Programa::delete/$1');

$routes->post('codigo', 'Codigo::create');
$routes->get('codigos/(:num)', 'Codigo::getall/$1');
$routes->get('codigo-one/(:num)', 'Codigo::getone/$1');
$routes->get('codigo-delete/(:num)', 'Codigo::delete/$1');

$routes->post('quizz', 'Quizz::create');
$routes->post('quizz-update', 'Quizz::update');
$routes->get('quizz-all/(:num)', 'Quizz::getall/$1');
$routes->get('quizz-one/(:num)', 'Quizz::getone/$1');
$routes->get('quizz-delete/(:num)', 'Quizz::delete/$1');

$routes->post('respuestaquizz', 'Respuestaquizz::create');
$routes->post('respuestaquizz-update', 'Respuestaquizz::update');
$routes->get('respuestaquizz-all/(:num)', 'Respuestaquizz::getall/$1');
$routes->get('respuestaquizz-one/(:num)', 'Respuestaquizz::getone/$1');
$routes->get('respuestaquizz-delete/(:num)', 'Respuestaquizz::delete/$1');
$routes->get('respuestaquizz-delete-all/(:num)', 'Respuestaquizz::deleteall/$1');

$routes->post('puzzle', 'Puzzle::create');
$routes->post('puzzle-update', 'Puzzle::update');
$routes->post('puzzle-update-imagen/(:any)', 'Puzzle::updateimagen/$1');
$routes->get('puzzle-all/(:num)', 'Puzzle::getall/$1');
$routes->get('puzzle-one/(:num)', 'Puzzle::getone/$1');
$routes->get('puzzle-delete/(:num)/(:any)', 'Puzzle::delete/$1/$2');

$routes->post('cursoestudiante', 'Cursoestudiante::create');
$routes->get('cursoestudiante/(:num)/(:num)', 'Cursoestudiante::getone/$1/$2');
$routes->get('cursoestudiante-por-curso/(:num)', 'Cursoestudiante::getestudiantesporcurso/$1');
$routes->post('cambiar-estado-estudiante-curso', 'Cursoestudiante::updateestado');
$routes->get('cursoestudiante-aprobados/(:num)', 'Cursoestudiante::getoneaprobados/$1');

$routes->post('estudianteprograma', 'Estudiantesprogramas::create');
$routes->get('estudianteprograma-programa/(:num)', 'Estudiantesprogramas::getporprograma/$1');

$routes->post('respuestacodigo', 'RespuestaCodigo::create');
$routes->get('respuestacodigo-codigo/(:num)', 'RespuestaCodigo::getporcodigo/$1');
$routes->get('respuestacodigo-estudianteprograma/(:num)', 'RespuestaCodigo::getporrespuestacodigo/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

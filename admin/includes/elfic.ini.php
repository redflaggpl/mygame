<?php
/**
 * @Package: ELFIC FRAMEWORK
 * @Author: edison <edison [DOT] galindo [AT] gmail [DOT] com> www.elficsoft.com
 * @Date: Enero 15, 2011
 * @name elfic.ini.php
 * @version: 1.0
 */

date_default_timezone_set('America/Bogota');

define('SMARTY_DIR', APP_PATH.DS.'lib'.DS.'smarty'.DS);
// define smarty templates dir
define('SMARTY_TPLS_DIR', APP_PATH.DS.'smarty_tpls'.DS.'elfic'.DS);
//ruta imagenes local
define("IMG_PATH", APP_PATH.DS."images".DS);
//ruta imagenes local
define("FILES_PATH", APP_PATH.DS."files".DS);

//Titulo de la aplicación
define("APP_TITULO", "myGame :: accept you the challenge?");

//URL de la aplicación
define("APP_URL", "http://mygame.ins.net.co/");
define("APP_URL_ADM", APP_URL . "admin/");

include(APP_PATH.DS."includes".DS."config.php");
require(APP_PATH.DS.'includes'.DS.'lang.es.php');
require(APP_PATH.DS.'includes'.DS.'tables.inc.php');
require(SMARTY_DIR.'Smarty.class.php');
require(APP_PATH.DS.'lib'.DS.'DB.php');
require(APP_PATH.DS.'lib'.DS.'Utils.php');
require(APP_PATH.DS.'lib'.DS.'Elfic.php');
require(APP_PATH.DS.'lib'.DS.'home'.DS.'Home.php');
require(APP_PATH.DS. 'lib'.DS.'auth'.DS.'AuthUser.php');
require(APP_PATH.DS.'lib'.DS.'Elfic_Smarty.php');
include(APP_PATH.DS.'lib'.DS.'phpMailer'.DS.'class.phpmailer.php');
include(APP_PATH.DS.'lib'.DS.'Pagination.php');
include(APP_PATH.DS.'lib'.DS.'usuarios'.DS.'Usuarios.php');
include(APP_PATH.DS.'lib'.DS.'HTMLCleaner.php');
require(APP_PATH.DS.'lib'.DS.'usuarios'.DS.'Permisos.php');
require(APP_PATH.DS.'lib'.DS.'usuarios'.DS.'Password.php');
include APP_PATH.DS.'lib'.DS.'instituciones'.DS.'Institucion.php';
include APP_PATH.DS.'lib'.DS.'instituciones'.DS.'Curso.php';

/* componente reportes */
include APP_PATH.DS.'lib'.DS.'reportes'.DS.'Reportes.php';
include APP_PATH.DS.'lib'.DS.'reportes'.DS.'Reportes_Estudiante.php';
include APP_PATH.DS.'lib'.DS.'reportes'.DS.'Reportes_Curso.php';

/* Componente Usuarios - Mod Estudiantes */
include(APP_PATH.DS.'lib'.DS.'usuarios'.DS.'Estudiantes.php');
include(APP_PATH.DS.'lib'.DS.'usuarios'.DS.'AdminInstitucion.php');
include(APP_PATH.DS.'lib'.DS.'usuarios'.DS.'Docentes.php');

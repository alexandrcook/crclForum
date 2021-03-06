<?php
namespace App\Framework;

use App\Framework\Config;
use App\Framework\Routing;
use App\Database\DB;
use App\Services\ServicesContainer;

class App
{
	
	public function run() {
	    if( APP_MODE === 'DEBUG' ) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
        //set_exception_handler([$this, 'exception_handler']);

        $config = Config::init();

        $database = DB::init(
            $config->get('db.host'),
            $config->get('db.user'),
            $config->get('db.password'),
            $config->get('db.database')
        );

        if( $routeHandler = (Routing::init())->getCurrRouteHandler() ) {
            $servicesContainer = new ServicesContainer();
            $className = 'App\Controllers\\'. $routeHandler[0];
            $methodName = $routeHandler[1];

            var_dump($className);
            var_dump($methodName);

            $controller = new $className( $config, $database, $servicesContainer );
            $controller->$methodName();
        }
        else {
            header('location: /404');
        }

	}

    public function exception_handler($exception) {
        echo "Неперехваченное исключение: " , $exception->getMessage(), "<br/>";
        echo "File: " , $exception->getFile(), "<br/>";
        echo "Line: " , $exception->getLine(), "<br/>";
    }
	
}
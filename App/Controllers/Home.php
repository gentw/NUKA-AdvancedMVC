<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    protected function indexAction()
    {
        /*View::render('Home/index.php',
        	array(
        		'name' => 'Genti',
        		'colours' => array('red', 'black', 'white')
        	)	
    	);*/
    	View::renderTemplate('Home/index.html',
        	array(
        		'name' => 'Genti',
        		'colours' => array('red', 'black', 'white')
        	)	
    	);
    }
}

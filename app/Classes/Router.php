<?php

namespace App\Classes;

use AltoRouter;
use App\Classes\Erreur404Controller;

class Router
{
    protected $router;

    protected $match;
    protected $controller;
    protected $method;

    public function __construct()
    {
        $this->router = new AltoRouter();

        $this->router->setBasePath(RACINE);

    }

    public function get(string $url, string $appel, string $name = null): self
    {
        $this->router->map('GET', $url, $appel, $name);
        return $this;
    }
    public function post(string $url, string $appel, string $name = null): self
    {
        $this->router->map('POST', $url, $appel, $name);
        return $this;
    }
    public function montre()
    {
    }
    public function run()
    {
        $match = $this->router->match();
      

        if (is_array($match) && is_callable($match['target']) . 'Controller') {

          

            list($controller, $action) = explode('#', $match['target']);
           
            $ctrl = '\Gsb\Controllers\\' . ucfirst($controller) . 'Controller';

            $controller = new $ctrl;

            call_user_func_array(array($controller, $action), array($match['params']));

        } else {
            (new Erreur404Controller())->index();
        }

    }
}

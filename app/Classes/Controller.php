<?php

namespace App\Classes;

/**
 * Controlleur parent
 */
abstract class Controller
{

    /**
     * Référence de l'objet model instancié par $modelName (enfant)
     * @var object
     */
    protected $model;

    public function __construct()
    {
        if (isset($this->modelName)) {
            $this->model = new $this->modelName();
        }
    }

    /**
     * Rendu de la vue
     *
     * @param string $view
     * @param array $variables
     * @return void
     */

    protected function render(string $view, array $variables = [])
    {
        ob_start();

        extract($variables);

        require "../src/views/" . $view . '.php';
    
        $contenu = ob_get_clean();

        require "../src/views/template/default.php";

    }

}

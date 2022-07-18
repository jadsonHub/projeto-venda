<?php


namespace App\router;

use App\router\web\Http;
use App\web;

//classe responsavel pelas rotas do projeto, aqui pegamos a uri e o method pra chamar o controller
class Router
{

    protected string $request_uri;
    protected string $request_method;
    protected array $routes;
    protected string $param;


    public function __construct()
    {
        $this->request_uri = $this->getUri();
        $this->request_method = $this->getMethod();
        $this->routes =  Http::getRoutes();
        $this->param = $this->getParam();
    }

    public function Router()
    {
        return $this->Routes();
    }

    protected function Routes()
    {

        if (isset($this->routes[$this->request_method][$this->filterRoute()])) {

            $controller = explode('@', $this->routes[$this->request_method][$this->filterRoute()]);
            $instancia = $this->requireController($controller[0]);
            $method = $controller[1];
            if (empty($this->param)) {
                return $instancia->$method();
            }
            return $instancia->$method($this->param);
        }

        return $this->errorRoutes();
    }

    protected function errorRoutes($typeErro = '')
    {
        $instancia = $this->requireController('ErrorController');

        if ($this->request_method === 'GET') {
            if (!empty($typeErro)) {
                return $instancia->errorGetParam($typeErro);
            }
            return $instancia->errorGet();
        } else if (!empty($typeErro)) {
            return $instancia->errorGetParam($typeErro);
        } else {
            return $instancia->errorPost();
        }
    }

    protected function  filterRoute()
    {
        $rota = explode('/', $this->request_uri);
        if ($this->getParam()) {
            unset($rota[3]);
            return implode('/', $rota) . '/';
        }
        return $this->request_uri;
    }

    protected function getParam()
    {

        $param = explode('/', $this->request_uri);
        if (isset($param[3])) {
            if (empty($param[3])) {
                return $this->errorRoutes('Deu erro é esperado um paramento');
            }

            return $param[3];
        }
        return '';
    }

    protected function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    protected function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    protected  function requireController(string $controller)
    {
        $instancia = "App\\controller\\" . $controller;
        // retorna a instancia 
        return new $instancia;
    }
}

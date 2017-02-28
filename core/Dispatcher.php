<?php


    class  Dispatcher{

        var $requeste;

        public  function __construct()
        {
            $this->requeste = new Request();
            Route::decoup($this->requeste->url, $this->requeste);
            $controller = $this->loadController();
            if(!in_array($this->requeste->action,get_class_methods($controller))){
                $this->error('page not exist');
            }
            call_user_func_array(array($controller,$this->requeste->action),$this->requeste->params);
            $controller->render($this->requeste->action);
        }

        public function error($message){
            header("HTTP/1.0 404 Not Found");
            $controller = new Controller($this->requeste);
            $controller->set('message',$message);
            $controller->render('/errors/404');
            die();
        }

        public function loadController(){
           $name = ucfirst($this->requeste->controller).'Controller';
            $file = ROOT.DS.'controller'.DS.$name.'.php';
            require $file;
            return new $name($this->requeste);
        }
    }



?>
<?php


    class  Dispatcher{

        var $requeste;

        public  function __construct()
        {
            $this->requeste = new Request();
            Route::decoup($this->requeste->url, $this->requeste);
            $controller = $this->loadController();
            call_user_func_array(array($controller,$this->requeste->action),$this->requeste->params);
        }

        public function loadController(){
           $name = ucfirst($this->requeste->controller).'Controller';
            $file = ROOT.DS.'controller'.DS.$name.'.php';
            require $file;
            return new $name($this->requeste);
        }
    }



?>
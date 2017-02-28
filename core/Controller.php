<?php
    class  Controller{

        public $variabls = array();
        public $request;
        public  function  __construct($request)
        {
            $this->request = $request;
        }

        public function set($key , $value=null){

            if(is_array($key)){
                $this->variabls += $key;
            }
            else{
                $this->variabls[$key] = $value;
            }
        }
        public function render($view){
            extract($this->variabls);
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
            require($view);
        }
    }



?>
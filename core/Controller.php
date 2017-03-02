<?php
    class  Controller{

        public $variabls = array();
        public $request;
        public $layout = 'default';
        private $render = false;
        public  function  __construct($request)
        {
            $this->request = $request;
        }

        /*
         * Set variable from any controller to view
         */
        public function set($key , $value=null){

            if(is_array($key)){
                $this->variabls += $key;
            }
            else{
                $this->variabls[$key] = $value;
            }
        }

        /*
         * Include view and layout
         */
        public function render($view){
            if($this->render){ return false; }
            extract($this->variabls);
            if(strpos($view,'/')===0){
                $view = ROOT.DS.'view'.$view.'.php';
            }else{
                $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
            }
            ob_start();
            require($view);
            $content = ob_get_clean();
            require ROOT.DS.'view'.DS.'layouts'.DS.$this->layout.'.php';
            $this->render = true;
        }

        public function loadModel($name){
            $file = ROOT.DS.'model'.DS.$name.'.php';
            require_once($file);
            if(!isset($this->name)){
                $this->name = new $name();
            }

        }
    }



?>


<?php

        class Request{

            public $url;

            public function __construct()
            {
                $this->url = $_SERVER['PATH_INFO'];


            }
        }


?>
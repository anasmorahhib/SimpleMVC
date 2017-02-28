<?php
        class PostsController extends Controller {
    
                public function view($params){
                    $this->set(array(
                        'name' => 'anas',
                        'website' => 'morahhib.com'
                    ));
                    $this->render('index');
                }

        }



?>



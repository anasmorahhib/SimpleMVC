<?php
        class PostsController extends Controller {

                public function index(){
                        $this->loadModel('Post');
                        $this->loadModel('Post');

                        $this->render('index');
                }

        }



?>



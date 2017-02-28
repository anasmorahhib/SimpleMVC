
<?php


        class Route{

            static function decoup($url,$request){
                $url = trim($url, '/');
                $params = explode('/',$url);
                $request->controller = $params[0];
                $request->action = $params[1];
                $request->params = array_slice($params,2);
                return true;
            }
        }



?>
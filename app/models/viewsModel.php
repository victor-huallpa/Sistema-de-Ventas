<?php
    
    namespace app\models;

    class viewsModel{
        /* MOdelo para obtener las vista */

        protected function obtVisMo($vista){
            $lisBlan= ["dashboard","userNew","userList","userUpdate","userPhoto","cashierNew","cashierList","cashierUpdate"];

            if (in_array($vista,$lisBlan)) {
                if (is_file("app/views/content/".$vista."-view.php")) {
                    $conte = "app/views/content/".$vista."-view.php";
                }else{
                    $conte = "404";
                }
            }elseif($vista == "login" || $vista == "index"){
                $conte="login";
            }else{
                $conte="404";
            }
            return $conte;
        }
    }
<?php

    namespace app\controllers;
    use app\models\viewsModel;

    class viewsController extends viewsModel{
        /**--------- Controlador apra obtener vistas--------------*/

        public function obtVisCon($vista){
            if ($vista != "") {
                $resp=$this->obtVisMo($vista);
            } else {
                $resp= "login";
            }
            
            return $resp;
        }
    }
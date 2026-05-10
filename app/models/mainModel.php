<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__."/../../config/server.php")){
        require_once __DIR__."/../../config/server.php";
    }

    class mainModel{
        //datos de conexion

        private $server=BD_SERVER;
        private $bd=BD_NAME;
        private $user=BD_USER;
        private $pass=BD_PAS;

        //Metodo conexion abase de datos

        protected function conect(){
            $conex = new PDO("mysql:host={$this->server};dbname={$this->bd}",$this->user,$this->pass);
            $conex->exec("SET CHARACTER SET utf8");

            return $conex;
        }

        //Metodo ejecutar cosnultas
        protected function ejeCon($consul){
            $sql=$this->conect()->prepare($consul);
            $sql->execute();
            return $sql;
        }

        //Metodo limpiar cadena
        public function limCade($cade){
            $pal=["<script>","</script>","<script src","<script type=","SELECT * FROM","SELECT "," SELECT ","DELETE FROM","INSERT INTO","DROP TABLE","DROP DATABASE","TRUNCATE TABLE","SHOW TABLES","SHOW DATABASES","<?php","?>","--","^","==",";","::","'or","1=1","'or 1=1"];

            $cade=trim($cade);//limpiar esapcios
            $cade=stripslashes($cade);//quietar antislash

            foreach ($pal as $val) {
                $cade=str_ireplace($val, "", $cade);//filtramos las palabras (tamos lo que no queremos en neustra cadena)
            }

            $cade=trim($cade);//limpiar esapcios
            $cade=stripslashes($cade);//quietar antislash

            return $cade;

        }

        //Metodo filtrado con expresiones regualres
        protected function veriDa($fil, $cade){
            if (preg_match("/^{$fil}$/", $cade)) {
                return false;
            } else {
                return true;
            }
            
        }

        //Metodo INSERTAR datos en base de datso
        protected function guarDa($ta, $da){
            $query="INSERT INTO {$ta} (";
            $c=0;
            foreach ($da as $key) {
                if($c>-1)$query.=",";
                $query.=$key["campo_nombre"];
                $c++;
            }

            $query.=") VALUES(";
            $c=0;
            foreach ($da as $key) {
                if($c>-1)$query.=",";
                $query.="'{$key["campo_valor"]}'";
                $c++;
            }

            $query.=")";

            $sql=$this->conect();
            $sql->beginTransaction();
            $sql->prepare($query);//evita inyeccion sql

            $sql->exec($query);
            return $sql;

            //nopta porque no se susa el metodod ejecutar consulta.


            // INSERT INTO table (capo1, campo2) VALUES(valo1, valor2)
        }

        //Metodo SELECCIONAR datos
        public function selDa($ti, $ta, $cam, $id){
            $ti=$this->limCade($ti);
            $ta=$this->limCade($ta);
            $cam=$this->limCade($cam);
            $id=$this->limCade($id);

            if ($ti=="Unico") {
                $sql=$this->conect()->prepare("SELECT * FROM {$ta} WHERE {$cam}=:ID");
                $sql->bindParam(":ID",$id);
            } elseif($ti=="Normal"){
                $sql=$this->conect()->prepare("SELECT {$cam} FROM {$ta}");
            }
            
            $sql->execute();
            return $sql;
        }

        //METODO APRA ACTUALIZAR UPDATE)
        protected function actuaDa($ta, $da, $condi){

            $query="UPDATE {$ta} SET ";

            $c=0;
            foreach ($da as $key) {
                if($c>-1)$query.=",";
                $query.="{$key["campo_nombre"]}='{$key["campo_valor"]}'";
                $c++;
            }

            $query.="WHERE {$condi["condicion_campo"]}='{$condi["condicion_valor"]}'";

            $sql=$this->conect();
            $sql->beginTransaction();
            $sql->prepare($query);//evita inyeccion sql

            $sql->exec($query);
            return $sql;
            //UPDATE table SET campo='valor', campo='valor' WHERE campo='valor'
        }

        //metdo eliminar registro
        protected function eliRegis($ta, $cam, $id){
        
            $query="DELETE FROM {$ta}, WHERE {$cam}='{$id}'";

            $sql=$this->conect();
            $sql->beginTransaction();
            $sql->prepare($query);//ebita inyeccion sql

            $sql->exec($query);
            return $sql;

        }


        //PAGINADOR DE TABLAS
        protected function pagiTa($pa, $numPa, $url, $bot){

            $ta='<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';
            
            if ($pa<=1) {
                $ta.='
                <a class="pagination-previous is-disabled" disabled ><i class="fas fa-arrow-alt-circle-left"></i> &nbsp; Anterior</a>
                <ul class="pagination-list">
                ';
            } else {
                $ta.='
                <a class="pagination-previous" href="'.$url.($pa-1).'/"><i class="fas fa-arrow-alt-circle-left"></i> &nbsp; Anterior</a>
                <ul class="pagination-list">
                    <li><a class="pagination-link" href="'.$url.'1/">1</a></li>
	                <li><span class="pagination-ellipsis">&hellip;</span></li>
                ';
            }

            $ci=0;
            for($i=$pa; $i<=$numPa; $i++){

                if($ci>=$bot){
                    break;
                }

                if($pa==$i){
                    $ta.='<li><a class="pagination-link is-current" href="'.$url.$i.'/">'.$i.'</a></li>';
                }else{
                    $ta.='<li><a class="pagination-link" href="'.$url.$i.'/">'.$i.'</a></li>';
                }

                $ci++;
            }

            if($pa==$numPa){
                $ta.='
                </ul>
                <a class="pagination-next is-disabled" disabled ><i class="fas fa-arrow-alt-circle-right"></i> &nbsp; Siguiente</a>
                ';
            }else{
                $ta.='
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
	                <li><a class="pagination-link" href="'.$url.$numPa.'/">'.$numPa.'</a></li>
                </ul>
                <a class="pagination-next" href="'.$url.($pa+1).'/"><i class="fas fa-arrow-alt-circle-right"></i> &nbsp; Siguiente</a>
                ';
            }
            
            $ta.='</nav>';
        }

        //METODO GENERAR SELECT
        public function genSel($da, $camDB){
            $check_se='';
            $text_se='';
            $count_se='';
            $select='';

            foreach($da as $row){

                if ($camDB==$row) {
                    $check_se='selected=""';
                    $text_se='Actual';
                }

                $select.='<option values="'.$row.'" '.$check_se.'>'.$count_se.' - '.$row.$text_se.'</option>';


                $check_se='';
                $text_se='';
                $count_se++;
            }

            return $select;

        }

        //METODO GENERAR CODIGO ALEATORIOS
        protected function genCodAl($long, $corr){
            $codi="";
            $carac="Letra";

            for($i=1; $i<=$long; $i++){
                if($carac=="Letra"){
                    $letra_alea=chr(rand(ord("a"),ord("z")));
                    $letra_alea=strtoupper($letra_alea);
                    $codi.=$letra_alea;
                    $carac="Numero";
                }else{
                    $num_alea=rand(0,9);
                    $codi.=$num_alea;
                    $carac="Letra";
                }
            }

            return $codi."-".$corr;
        }
    }
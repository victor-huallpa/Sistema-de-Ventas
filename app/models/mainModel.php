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
    }
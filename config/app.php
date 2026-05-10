<?php
//constantes de la app
    const APP_URL="http://localhost/PHP/proyectos-php/SVentas/";
    const APP_NAME="VENTAS";
    const APP_SESSION_NAME="POS";
    
    //constantes de documetno usuario
    const DOCUMENTOS_USUARIOS=["DUI", "DNI", "Cedula", "Licencia", "Pasaporte", "Otro"];
    //constante de producto unidad
    const PRODUCTO_UNIDAD=["Unidad", "Libra", "Kilogramo", "Caja", "Paquete", "Lata", "Galon", "Botella", "Tira", "Sobre", "Bolsa", "Saco", "Targeta", "Otro"];
    //constantes para el tipo de moneda
    const MONEDA_SIMBOLO="$";
    const MONEDA_NOMBRE="USD";
    const MONEDA_DECIMALES="U2";
    const MONEDA_SEPARADOR_MILLAR=",";
    const MONEDA_SEPARADOR_DECIMAL=".";
    //constantes de campos obligatorios
    const CAMPO_OBLIGATORIO='&nbsp; <i class="fas fa-edit"></i> &nbsp;';
    //cosntante de zona horaria
    date_default_timezone_set("America/Lima");

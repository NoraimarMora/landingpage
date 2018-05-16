<?php

require_once(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include_once('landingpage.php');

$module = new LandingPage();
switch(Tools::getValue('action')) {
    case "add":
    	$dir = _PS_MODULE_DIR_ . 'landingpage/img/';

    	$archivo = $_POST['img'];

    	$archivo_destino = null;
        $url = "".Tools::getHttpHost(true).__PS_BASE_URI__."modules/landingpage/img/" . $archivo;

    	if($archivo) {
    		$archivo_destino = $dir . basename($archivo);


    		if(move_uploaded_file($archivo, $archivo_destino)) {
                echo "archivo guardado correctamente";
    			return $module->addBanner($url);
    		}else
                echo "error";

    	}

        echo $url;
    	break;
    case "delete":
    	/*return $module->deleteBanner();*/
    	break;
}
<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
/*include_once('landingpage.php');

$module = new LandingPage();*/
switch(Tools::getValue('action')) {
    case "add":
    	/*$dir = _PS_MODULE_DIR_ . 'landingpage/img/';

    	$archivo = Tools::fileAttachment('banner');

    	$archivo_destino = null;

    	if($archivo) {
    		$archivo_destino = $dir . basename($archivo['name']);

    		if(move_uploaded_file($archivo['tmp_name'], $archivo_destino)) {
    			return $module->addBanner($dir . $archivo['name']);
    		}

    	}*/
        echo "<script>alert('chao');</script>";
    	break;
    case "delete":
    	/*return $module->deleteBanner();*/
    	break;
}
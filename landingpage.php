<?php

/**
 * Landing Page
 *
 * @author    Noraimar Mora <noraimar.mora@gmail.com>
 * @copyright 2018 Noraimar Mora
 * @license   You are just allowed to modify this copy for your own use. You must not redistribute it. License is
 *            permitted for one Prestashop instance only but you can install it on your test instances.
 */


/*
 * Buscar en el modulo ageconsent el hook utilizado para
 * mostrar el tpl apenas cargue la pagina
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class LandingPage extends Module 
{
	public function __construct()
    {
        $this->name = 'landingpage';
        $this->tab = 'front_office_features';
        $this->author = 'Noraimar Mora';
        $this->version = '0.0.1';
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.7');
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Landing Page');
        $this->description = $this->l('Configura el landing page de tu tienda');
    }

    public function install()
    {
    	return parent::install() && $this->installDB();
    }

    public function uninstall()
    {
    	return parent::uninstall() && $this->uninstallDB();
    }

    public function installDB()
    {
    	return Db::getInstance()->Execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'banner_landingpage`(
    			`id_banner` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    			`url_banner` VARCHAR(200),
    			PRIMARY KEY (`id_banner`)
    		);');
    }

    public function uninstallDB()
    {
    	return Db::getInstance()->Execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'banner_landingpage`;');
    }

    public function getContent()
    {
    	$output = null;

    	if (Tools::isSubmit('submit'.$this->name)) {
            $errors = $this->postValidation();

            if (!count($errors)) {
                 $output .= $this->postProcess();
            } else {
                foreach ($errors as $error) {
                    $output .= $this->displayError($error);
                }
            }
        }


        return $output.$this->displayForm();
    }

    public function displayForm()
    {
    	$fields_form[0]['form'] = array(
    		'legend' => array(
    			'title' => $this->l('Redes Sociales'),
    			'icon' => 'icon-rss'
    		),
    		'input' => array(
    			array(
    				'type' => 'text',
    				'label' => $this->l('Facebook'),
    				'name' => 'lp_facebook',
    				'desc' => 'URL de tu cuenta oficial de Facebook'
    			),
    			array(
    				'type' => 'text',
    				'label' => $this->l('Instagram'),
    				'name' => 'lp_instagram',
    				'desc' => 'URL de tu cuenta oficial de Instagram'
    			),
    			array(
    				'type' => 'text',
    				'label' => $this->l('Whatsapp'),
    				'name' => 'lp_whatsapp',
    				'desc' => 'Numero de telefono (Incluir codigo de area. Ej.: +56)'
    			),
    		),
    		'submit' => array(
    			'title' => 'Guardar',
    			'class' => 'btn btn-default pull-right'
    		)
    	);

    	$fields_form[1]['form'] = array(
    		'legend' => array(
    			'title' => $this->l('Banners'),
    			'icon' => 'icon-camera'
    		),
    		'input' => array(
    			array(
    				'type' => 'banner',
	    			'banners' => $this->getBanners()
	    		)
    		)
    	);

    	$values['lp_facebook']   = Configuration::get('lp_facebook');
        $values['lp_instagram']  = Configuration::get('lp_instagram');
        $values['lp_whatsapp']  = Configuration::get('lp_whatsapp');


        $helper                  = new HelperForm();
        $helper->module          = $this;
        $helper->name_controller = $this->name;
        $helper->token           = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex    = AdminController::$currentIndex.'&configure='.$this->name;
        $helper->submit_action = 'submit'.$this->name;
        $helper->languages       = $this->context->controller->_languages;
        $helper->default_form_language    = $this->context->controller->default_form_language;
        $helper->allow_employee_form_lang = $this->context->controller->default_form_language;
        $helper->toolbar_scroll     = false;
        $helper->show_toolbar       = false;
        $helper->show_cancel_button = true;

        $helper->fields_value = $values;
        return $helper->generateForm($fields_form);
    }

    public function postProcess()
    {
    	Configuration::updateValue('lp_facebook', Tools::getValue('lp_facebook'));
        Configuration::updateValue('lp_instagram', Tools::getValue('lp_instagram'));
        Configuration::updateValue('lp_whatsapp', Tools::getValue('lp_whatsapp'));

        return $this->displayConfirmation($this->l('Configuracion actualizada'));
    }

    public function postValidation()
    {
    }

    public function addBanner($url_banner)
    {
    	return Db::getInstance()->execute("INSERT INTO " . _DB_PREFIX_ . "banner_landingpage (url_banner) VALUES ($url_banner)");
    }

    public function deleteBanner($id_banner)
    {
    	return Db::getInstance()->execute("DELETE FROM " . _DB_PREFIX_ . "banner_landingpage WHERE id_banner = $id_banner");
    }

    public function getBanners()
    {
    	return Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "banner_landingpage");
    }
}
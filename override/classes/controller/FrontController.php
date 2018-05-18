<?php

class FrontController extends FrontControllerCore
{
    /**
     * Displays maintenance page if shop is closed.
     */
    protected function displayMaintenancePage()
    {
        if ($this->maintenance == true || !(int)Configuration::get('PS_SHOP_ENABLE')) {
            $this->maintenance = true;
            if (!in_array(Tools::getRemoteAddr(), explode(',', Configuration::get('PS_MAINTENANCE_IP')))) {
                header('HTTP/1.1 503 temporarily overloaded');

                $this->context->smarty->assign($this->initLogoAndFavicon());
                $this->context->smarty->assign(array(
                    'HOOK_MAINTENANCE' => Hook::exec('displayMaintenance', array()),
                ));
                $this->context->smarty->assign(
                    array(
                        'dir' => "".Tools::getHttpHost(true).__PS_BASE_URI__."modules/landingpage/",
                        'img' => Configuration::get("lp_imagen")
                    )

                );
                $this->smartyOutputContent(_PS_MODULE_DIR_ . 'landingpage/views/templates/front/landingpage.tpl');
                exit;
            }
        }
    }
}

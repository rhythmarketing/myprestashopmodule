<?php



if (!defined('_PS_VERSION_'))
    exit;

require_once('vendor/autoload.php');

class Module extends Module
{
    public function __construct()
    {
        $this->name = 'mymodule';
        $this->tab = 'advertising_marketing';
        $this->version = '0.0.1';
        $this->author = 'Module Creator';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Module for PrestaShop');
        $this->description = $this->l('Module for PrestaShop platform');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME'))
            $this->warning = $this->l('No name provided');
    }

    public function install()
    {
        return parent::install();
    }


    public function uninstall()
    {
        return parent::uninstall();
    }
}

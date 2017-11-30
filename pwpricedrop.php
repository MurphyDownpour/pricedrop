<?php
if (!defined('_PS_VERSION_'))
    exit;

class pwpricedrop extends Module
{
    public function __construct()
    {
        $this->name = strtolower(get_class());
        $this->tab = 'other';
        $this->version = 0.1;
        $this->author = 'PrestaWeb.ru';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l("Price Drop");
        $this->description = $this->l("This is module for price drop");
        
        $this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {

        if ( !parent::install() 
			OR !$this->registerHook('displayHome'))
            return false;

        return true;
    }

    public function getContent()
    {
        $this->configProccess();
        $this->saveConfiguration();
        return $this->display(__FILE__, 'getContent.tpl');
    }

    public function configProccess()
    {
        if (Tools::isSubmit('submitButton'))
        {
            $quantity = Tools::getValue('quantity');
            if (!Validate::isInt($quantity))
            {
                $this->context->smarty->assign('success', 'no');
                return $this->display(__FILE__, 'getContent.tpl');
            }

            Configuration::updateValue('PRICEDROP_QUANTITY', $quantity);
            $this->context->smarty->assign('success', 'yes');
            return $this->display(__FILE__, 'getContent.tpl');
        }
    }

    public function saveConfiguration()
    {
        $quantity = Configuration::get('PRICEDROP_QUANTITY');
        $this->context->smarty->assign('quantity', $quantity);
    }

	public function hookdisplayHome($params){
        $limit = Configuration::get('PRICEDROP_QUANTITY');
        $sql = 'SELECT ' .
                _DB_PREFIX_. 'product.quantity_discount, ' .
                _DB_PREFIX_ . 'product.price, ' .
                _DB_PREFIX_ . 'product_lang.name, ' .
                _DB_PREFIX_ . 'product_lang.available_now ' .
                'FROM ' .  _DB_PREFIX_ . 'product ' .
                'INNER JOIN ' . _DB_PREFIX_ . 'product_lang ' .
                'ON ' . _DB_PREFIX_ . 'product.id_product = ' . _DB_PREFIX_ . 'product_lang.id_product ' .
                'WHERE ' . _DB_PREFIX_ . 'product.quantity_discount > 0 LIMIT ' . $limit;
        $products = Db::getInstance()->executeS($sql);
        $this->context->smarty->assign('products', $products);
		return $this->display(__FILE__, 'pwpricedrop.tpl');
	}


}



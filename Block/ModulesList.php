<?php
declare(strict_types=1);

namespace Learning\ModulesList\Block;

class ModulesList extends \Magento\Framework\View\Element\Template
{
    protected $moduleList;
    protected $moduleReader;

    public function __construct(
        \Magento\Framework\Module\ModuleList $moduleList,
        \Magento\Framework\Module\Dir\Reader $moduleReader,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->moduleList = $moduleList;
        $this->moduleReader = $moduleReader;
        parent::__construct($context, $data);
    }

    public function getCustomModules()
    {
        $result = [];

        $modules = $this->moduleList->getNames();
        foreach ($modules as $_module) {
            $dir = $this->moduleReader->getModuleDir(null, $_module);
            if(strpos($dir, 'app/code') !== false || strpos($this->getDefaultThridPartyModules(), basename(dirname($dir))) == false)
            {
                $result[] = $_module;
            }
        }
        return $result;
    }

    public function getDefaultThridPartyModules()
    {
        return 'allure-framework,amzn,astock,bacon,beberlei,bin,braintree,christian-riesen,colinmollenhour,composer,container-interop,dealerdirect,doctrine,donatj,dotmailer,elasticsearch,endroid,ezimuel,friendsofphp,geoip2,google,guzzlehttp,jms,justinrainbow,khanamiryan,klarna,laminas,lusitanian,magento,maxmind,maxmind-db,mikey179,monolog,msp,myclabs,paragonie,pdepend,pelago,phar-io,php-amqplib,phpcollection,phpcompatibility,php-cs-fixer,phpdocumentor,phpmd,phpoption,phpseclib,phpspec,phpstan,phpunit,psr,ralouphie,ramsey,react,sebastian,seld,spomky-labs,squizlabs,symfony,tedivm,temando,theseer,true,tubalmartin,vertex,webimpress,webmozart,webonyx,wikimedia,yotpo,yubico';
    }
}

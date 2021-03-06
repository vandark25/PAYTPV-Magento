<?php
$installer = $this;

$installer->startSetup();
$setup = Mage::getModel('customer/entity_setup', 'core_setup');

try{
	$tablequote = $this->getTable('sales/quote');
	$installer->run("
	ALTER TABLE  $tablequote
	    DROP  `paytpv_iduser`,
	    DROP  `paytpv_tokenuser`,
	    DROP  `paytpv_cc`;
	");
}catch (exception $e){}
try{
	$tableorder = $this->getTable('sales/order');
	$installer->run("
	ALTER TABLE  $tableorder
	    ADD  `paytpv_iduser` INT NOT NULL ,
	    ADD  `paytpv_tokenuser` VARCHAR( 64 ) NULL DEFAULT NULL ,
	    ADD  `paytpv_cc` VARCHAR( 32 ) NULL DEFAULT NULL ;
	");

}catch (exception $e){}

$installer->endSetup();

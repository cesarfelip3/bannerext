<?php

$installer = $this;

$installer->startSetup();

$installer->run("-- DROP TABLE IF EXISTS {$this->getTable('cattopbanners')};
CREATE TABLE {$this->getTable('cattopbanners')} (
  `cattopbanners_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `imgfilename` varchar(255) NOT NULL default '',
  `bannerlink` varchar(255) NOT NULL default '',
  `advcode` text NOT NULL default '',
  `advmode` ENUM('0','1') NOT NULL COMMENT  '0 for code and 1 for image',  
  `posleft` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT 'positioned in left column',
  `poscontent` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT 'positioned in content column',
  `posright` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT 'positioned in right column',
  `poshome` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT 'positioned in home page',
  `poscat` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT 'positioned in category page',
  `posprod` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT 'positioned in product page',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`cattopbanners_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advbanneradvancedsettings/advbannerimgborderenabled','1');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advbanneradvancedsettings/advbannerimgwidth','100');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advbanneradvancedsettings/advbannerimgheight','80');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advbanneradvancedsettings/advbannerdisplayrandomlyenabled','1');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advbanneradvancedsettings/advbannerid','');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advbanneradvancedsettings/advbannerdisplaylabelenabled','1');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advancedcattopbannersblocksettings/cattopbannersdisplayleftblockenabled','1');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advancedcattopbannersblocksettings/cattopbannersdisplayrightblockenabled','1');");
$installer->run("INSERT INTO {$this->getTable('core_config_data')} (`scope`,`scope_id`,`path`,`value`) values ('default','0','cattopbanners/advancedcattopbannersblocksettings/cattopbannersdisplaycontentblockenabled','1');");

$installer->endSetup();
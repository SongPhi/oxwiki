<?php

define('OXWIKI_DIR_ROOT', dirname(__FILE__));
define('DOKUWIKI_DIR_ROOT', OXWIKI_DIR_ROOT . '/dokuwiki');
define('OXWIKI_DIR_USERFILES', OW::getPluginManager()->getPlugin('oxwiki')->getUserFilesDir());
define('OXWIKI_DIR_PLUGINFILES', OW::getPluginManager()->getPlugin('oxwiki')->getPluginFilesDir());

// Routers declaration
OW::getRouter()->addRoute(new OW_Route('oxwiki', 'wiki', 'OXWIKI_CTRL_Doku', 'index'));
OW::getRouter()->addRoute(new OW_Route('oxwiki_onelvl', 'wiki/:any', 'OXWIKI_CTRL_Doku', 'index'));
OW::getRouter()->addRoute(new OW_Route('oxwiki_twolvl', 'wiki/:any/:any1', 'OXWIKI_CTRL_Doku', 'index'));
OW::getRouter()->addRoute(new OW_Route('oxwiki_threelvl', 'wiki/:any/:any1/:any2', 'OXWIKI_CTRL_Doku', 'index'));
OW::getRouter()->addRoute(new OW_Route('oxwiki_fourlvl', 'wiki/:any/:any1/:any2/:any3', 'OXWIKI_CTRL_Doku', 'index'));
OW::getRouter()->addRoute(new OW_Route('oxwiki_fivelvl', 'wiki/:any/:any1/:any2/:any3/:any4', 'OXWIKI_CTRL_Doku', 'index'));
OW::getRouter()->addRoute(new OW_Route('oxwiki_sixlvl', 'wiki/:any/:any1/:any2/:any3/:any4/:any5', 'OXWIKI_CTRL_Doku', 'index'));
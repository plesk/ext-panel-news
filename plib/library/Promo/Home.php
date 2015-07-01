<?php
// Copyright 1999-2015. Parallels IP Holdings GmbH.
class Modules_PanelNews_Promo_Home extends pm_Promo_Home
{

    public function getTitle()
    {
        return  $this->lmsg('blockTitle');
    }

    public function getText()
    {
        pm_Context::init($this->_moduleId);
        return pm_Settings::get('news_text');
    }

    public function getButtonText()
    {
        return $this->lmsg('buttonTitle');
    }

    public function getButtonUrl()
    {
        return pm_Settings::get('news_link');
    }

    public function getIconUrl()
    {
        pm_Context::init('panel-news');
        return pm_Context::getBaseUrl() . '/images/feed.png';
    }

}

<?php
// Copyright 1999-2017. Parallels IP Holdings GmbH.
class Modules_PanelNews_Promo_Home extends pm_Promo_Home
{

    public function getTitle()
    {
        pm_Context::init('panel-news');
        return $this->lmsg('blockTitle');
    }

    public function getText()
    {
        pm_Context::init($this->_moduleId);
        $text = (string)pm_Settings::get('news_text');
        return $text ? $text : $this->lmsg('noFeed');
    }

    public function getButtonText()
    {
        pm_Context::init('panel-news');
        return $this->lmsg('buttonTitle');
    }

    public function getButtonUrl()
    {
        $link = (string)pm_Settings::get('news_link');
        return $link ? $link : '#';
    }

    public function getIconUrl()
    {
        pm_Context::init('panel-news');
        return pm_Context::getBaseUrl() . '/images/feed.png';
    }

}

<?php
// Copyright 1999-2014. Parallels IP Holdings GmbH. All Rights Reserved.
class Modules_PanelNews_News
{

    public static function load()
    {
        $url = 'http://www.parallels.com/products/plesk/rss';
        $xml = simplexml_load_string(file_get_contents($url));

        $lastItem = $xml->channel->item;

        pm_Settings::set('news_text', (string) $lastItem->title);
        pm_Settings::set('news_link', (string) $lastItem->link);
    }

}

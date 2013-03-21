<?php

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

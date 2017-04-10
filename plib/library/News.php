<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
class Modules_PanelNews_News
{

    public static function load()
    {
        $url = 'https://www.plesk.com/feed';
        $content = @file_get_contents($url);
        if (false === $content) {
            return;
        }
        $xml = @simplexml_load_string($content);
        if (false === $xml || !$xml->channel) {
            return;
        }

        $lastItem = $xml->channel->item;

        pm_Settings::set('news_text', $lastItem ? (string) $lastItem->title : '');
        pm_Settings::set('news_link', $lastItem ? (string) $lastItem->link : '');
    }

}

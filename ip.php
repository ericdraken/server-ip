<?php
/**
 * Eric Draken
 * Date: 2016-09-03
 * Time: 8:47 PM
 * Desc: Report back the visitor's IP, even if it's through Cloudflare
 */

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

die($_SERVER['REMOTE_ADDR']);

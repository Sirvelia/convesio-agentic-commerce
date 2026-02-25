<?php

namespace ConvesioAgenticCommerce\Includes;

class Lyfecycle
{
    public static function activate($network_wide)
    {
        do_action('ConvesioAgenticCommerce/setup', $network_wide);
    }

    public static function deactivate($network_wide)
    {
        do_action('ConvesioAgenticCommerce/deactivation', $network_wide);
    }

    public static function uninstall()
    {
        do_action('ConvesioAgenticCommerce/cleanup');
    }
}

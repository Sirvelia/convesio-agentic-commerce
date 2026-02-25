<?php

namespace ConvesioAgenticCommerce\Includes;

class Loader
{
    public function __construct()
    {
        $this->loadDependencies();

        add_action('plugins_loaded', [$this, 'loadPluginTextdomain']);
    }

    private function loadDependencies()
    {
        //FUNCTIONALITY CLASSES
        foreach (glob(CONVESIO_AGENTIC_COMMERCE_PATH . 'Functionality/*.php') as $filename) {
            $class_name = '\\ConvesioAgenticCommerce\Functionality\\' . basename($filename, '.php');
            if (class_exists($class_name)) {
                try {
                    new $class_name(CONVESIO_AGENTIC_COMMERCE_NAME, CONVESIO_AGENTIC_COMMERCE_VERSION);
                } catch (\Throwable $e) {
                    pb_log($e);
                    continue;
                }
            }
        }

        //ADMIN FUNCTIONALITY
        if( is_admin() ) {
            foreach (glob(CONVESIO_AGENTIC_COMMERCE_PATH . 'Functionality/Admin/*.php') as $filename) {
                $class_name = '\\ConvesioAgenticCommerce\Functionality\Admin\\' . basename($filename, '.php');
                if (class_exists($class_name)) {
                    try {
                        new $class_name(CONVESIO_AGENTIC_COMMERCE_NAME, CONVESIO_AGENTIC_COMMERCE_VERSION);
                    } catch (\Throwable $e) {
                        pb_log($e);
                        continue;
                    }
                }
            }
        }
    }

    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('convesio-agentic-commerce', false, dirname(CONVESIO_AGENTIC_COMMERCE_BASENAME) . '/languages/');
    }
}

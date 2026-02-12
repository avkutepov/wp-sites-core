<?php

class ACF_Loader {

    public static function init(): void {

        if ( ! function_exists('acf_add_local_field_group') ) {
            return;
        }
        require_once __DIR__ . '/FieldGroups/options.php';
        require_once __DIR__ . '/FieldGroups/global-blocks.php';
    }
}

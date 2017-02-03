<?php

    /**
     * @author Jan Cinert
     */

    namespace LNC\OpenCart;

    interface AdapterInterface {

        public function loadLanguage( $arg1 );

        public function setCurrency( $arg1 );

        public function getExtensionModuleLink();

        public function getModuleLink( $name );

        public function getModulePath( $name );

        public function redirect( $url, $status = 302 );

        public function render( $tpl, $data );

        public function defaultChildControllers( & $data );

        public function getDefaultChildControllerName( $name );

        public function supportsEvents( $version = null );

    }

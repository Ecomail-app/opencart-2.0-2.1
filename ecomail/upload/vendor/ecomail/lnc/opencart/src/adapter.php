<?php

    /**
     * @author Jan Cinert
     */

    namespace LNC\OpenCart;

    class Adapter implements AdapterInterface {

        protected $controller;

        public function __construct( \Controller $controller ) {
            $this->controller = $controller;
        }

        public function loadLanguage( $arg1 ) {

            $this->controller->language->load( $arg1 );

        }

        public function setCurrency( $arg1 ) {

            $this->controller->currency->set( $arg1 );

        }

        public function getExtensionModuleLink() {

            return $this->controller->url->link(
                    'extension/module',
                    'token=' . $this->controller->session->data['token'],
                    true
            );

        }

        public function getModuleLink( $name ) {

            return $this->controller->url->link(
                    $this->getModulePath( $name ),
                    'token=' . $this->controller->session->data['token'],
                    true
            );

        }

        public function getModulePath( $name ) {
            return 'module/' . $name;
        }

        public function redirect( $url, $status = 302 ) {
        }

        public function render( $tpl, $data ) {
        }

        public function defaultChildControllers( & $data ) {
        }

        public function getDefaultChildControllerName( $name ) {
            return $name;
        }

        public function supportsEvents( $version = null ) {
            return false;
        }

    }
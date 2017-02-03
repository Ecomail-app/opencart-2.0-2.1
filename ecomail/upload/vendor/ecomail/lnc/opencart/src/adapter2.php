<?php

    /**
     * @author Jan Cinert
     */

    namespace LNC\OpenCart;

    class Adapter2 implements AdapterInterface {

        protected $controller;

        public function __construct( \Controller $controller ) {
            $this->controller = $controller;
        }

        public function loadLanguage( $arg1 ) {

            $this->controller->load->language( $arg1 );

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

            $this->controller->response->redirect(
                    $url,
                    $status
            );

        }

        public function render( $tpl, $data ) {

            return $this->controller->load->view(
                    $tpl . '.tpl',
                    $data
            );

        }

        public function defaultChildControllers( & $data ) {

            $data['header']      = $this->controller->load->controller( 'common/header' );
            $data['column_left'] = $this->controller->load->controller( 'common/column_left' );
            $data['footer']      = $this->controller->load->controller( 'common/footer' );

        }

        public function getDefaultChildControllerName( $name ) {
            return $name;
        }

        public function supportsEvents( $version = null ) {
            return $version === null || $version == '2.0';
        }

    }
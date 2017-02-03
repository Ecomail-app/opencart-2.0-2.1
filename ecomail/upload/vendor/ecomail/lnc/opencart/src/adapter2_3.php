<?php

    /**
     * @author Jan Cinert
     */

    namespace LNC\OpenCart;

    class Adapter2_3 extends Adapter2_2 {

        public function getExtensionModuleLink() {

            return $this->controller->url->link(
                    'extension/extension',
                    'token=' . $this->controller->session->data['token'] . '&type=module',
                    true
            );

        }

        public function getModulePath( $name ) {
            return 'extension/module/' . $name;
        }

        public function supportsEvents( $version = null ) {
            return $version === null || $version == '2.3';
        }

    }
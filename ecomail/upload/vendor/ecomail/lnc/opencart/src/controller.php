<?php

    namespace LNC\OpenCart;

    use Controller;

    class LNCController extends Controller {

        public function defaultChildControllers( & $data ) {

            if( $this->ecomail_adapter instanceof Adapter ) {
                $children = array(
                        'common/header',
                        'common/footer'
                );
                foreach( $children as $child ) {
                    $data[basename( $child )] = $this->getChild( $child );
                }
            }
            else {
                $this->ecomail_adapter->defaultChildControllers( $data );
            }

        }

        public function adaptedRender( $tpl, $data ) {

            if( $this->ecomail_adapter instanceof Adapter ) {
                $this->template = $tpl . '.tpl';
                $this->data     = $data;
                return $this->render();
            }

            else {
                return $this->ecomail_adapter->render(
                        $tpl,
                        $data
                );
            }

        }

        public function adaptedRedirect( $url, $status = 302 ) {

            if( $this->ecomail_adapter instanceof Adapter ) {
                $this->redirect(
                        $url,
                        $status
                );
            }
            else {
                $this->ecomail_adapter->redirect(
                        $url,
                        $status
                );
            }

        }

    }
<?php

    /**
     * @author Jan Cinert
     */

    namespace LNC\OpenCart;

    class Factory {

        public function factoryAdapter( $arg1 ) {
            if( version_compare(
                    constant( 'VERSION' ),
                    '2',
                    '>='
            ) ) {
                if( version_compare(
                        constant( 'VERSION' ),
                        '2.3',
                        '>='
                ) ) {
                    return new Adapter2_3( $arg1 );
                }
                elseif( version_compare(
                        constant( 'VERSION' ),
                        '2.2',
                        '>='
                ) ) {
                    return new Adapter2_2( $arg1 );
                }
                else {
                    return new Adapter2( $arg1 );
                }
            }
            else {
                return new Adapter( $arg1 );
            }
        }

    }
<?php

if(!function_exists('test'))
{
    function test()
    {
        return 'ABNC';
    }
}

if( ! function_exists('inputs') )
{
    function inputs(array $input)
    {
        $keys       = str_replace( '_', ' ', array_keys( $input ) );
        return array_combine( $keys, array_values( $input ) );
    }
}
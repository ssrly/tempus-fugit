<?php

function debug($var, $die = false) {
    return $die ? var_dump($var) : die(var_dump($var));
}

function debugIterations($var, $die = false) {
    foreach ($var as $key => $value) {
        var_dump($key);
        echo ' => ';
        if (is_iterable($value)) {
            foreach ($value as $key2 => $value2) {
                var_dump($key2);
                echo ' => ';
                var_dump($value2);
                echo '<br />';
            }
        } else {
            var_dump($value);
            echo '<br />';
        } 
        echo '<br />';
    }

    return;
}

function wrapVar($var) {
    return "<pre>$var</pre>";
}
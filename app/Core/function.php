<?php
    function dd($stuff)
    {
        echo '<pre>';
        print_r($stuff);
        echo '</pre>';
    }

    function escSpecial($value)
    {
        return htmlspecialchars($value);
    }

    function redirect($path)
    {
        header ("Location: " . ROOT."/".$path);
        die();
    }
?>
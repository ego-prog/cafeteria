<?php
    function get_post($conexão, $variável)
    {
        return $conexão->real_escape_string($_POST[$variável]);
    }
?>

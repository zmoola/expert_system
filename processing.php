<?php

function rev_calc($rules, $char)
{
    return(0);
}

function process_vars($vars, $query, $rules)
{
    $res = array();
    echo "<br /><br /> Processing<br />";
    for ($cn = 0; $cn < strlen($query); $cn++)
    {
        if (ctype_alpha($query[$cn]) && ctype_upper($query[$cn]))
            {
                if ($vars[$query[$cn]] === 1)
                {
                    $res[$query[$cn]] = 1;
                }
                else
                {
                    $res[$query[$cn]] = rev_calc($rules, $query[$cn]);
                }
            }
    }
    print_r($res);
}

?>
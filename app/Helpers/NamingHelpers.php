<?php

if (! function_exists('generate_account_id')) {
    function generate_account_id()
    {
        return 'ID_'.\Carbon\Carbon::now()->format('mYdH').random_int(1000, 9999);
    }
}


<?php

    function user()
    {
        $User = new \App\Models\User();
        $userId = session()->get('id');

        return $userId ? $User->find($userId) : null;
    }
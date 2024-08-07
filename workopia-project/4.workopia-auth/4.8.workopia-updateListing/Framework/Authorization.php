<?php

namespace Framework;

use Framework\Session;

class Authorization
{
    /**
     * Check if curr logged user owns listing
     * 
     * @param int $listingId
     * @return bool
     */
    public static function isOwner($listingId)
    {
        $sessionUser = Session::get('user');
        if ($sessionUser !== null && isset($sessionUser['id'])) {
            $sessionUserId = (int) $sessionUser['id'];
            return $sessionUserId === $listingId;
        }
        return false;
    }
}

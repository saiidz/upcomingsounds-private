<?php

namespace App\Templates;

interface IUserType
{
    const ARTIST = 'artist';
    const CURATOR = 'curator';
    const ADMIN = 'admin';
    const BLOG = 'blog';
    const IS_BLOG = 1;

    const DEPOSIT = 'DEPOSIT';
    const WITHDRAWAL = 'WITHDRAWAL';
}

<?php
/**
 * Created by PhpStorm.
 * User: vicko
 * Date: 03/03/18
 * Time: 21:53
 */

namespace App\Library\Enums;


class FacebookEndpoint
{
    private const PAGE_GRAPH_BASE = '/floydiansplit/';

    public const POSTS      = self::PAGE_GRAPH_BASE . 'posts?fields=message,created_time,picture,comments,permalink_url,type';
    public const EVENTS     = self::PAGE_GRAPH_BASE . 'events';

    public const EVENT_DETAILS  = '?fields=attending_count,interested_count,maybe_count,cover';
}
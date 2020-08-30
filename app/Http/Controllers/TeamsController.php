<?php

namespace App\Http\Controllers;

use App\TokenStore\TokenCache;
use Microsoft\Graph\Graph;

class TeamsController extends Controller
{
    public function channel()
    {
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $url = '/teams/' . env("TEAM_ID") . '/channels';

        $channels = $graph->createRequest('GET', $url)
            ->execute();

        return response()->json($channels->getBody());
    }
}

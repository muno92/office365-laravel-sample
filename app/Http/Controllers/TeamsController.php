<?php

namespace App\Http\Controllers;

use App\TokenStore\TokenCache;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\Channel;
use Microsoft\Graph\Model\ChatMessage;

class TeamsController extends Controller
{
    public function index()
    {
        $viewData = $this->loadViewData();

        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $url = '/teams/' . env("TEAM_ID") . '/channels';

        $channels = $graph->createRequest('GET', $url)
            ->setReturnType(Channel::class)
            ->execute();

        $viewData['channels'] = $channels;
        return view('teams', $viewData);
    }

    public function channel(string $id)
    {
        $viewData = $this->loadViewData();

        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $url = '/teams/' . env("TEAM_ID") . '/channels/' . $id . '/messages';

        $messages = $graph->createRequest('GET', $url)
            ->setReturnType(ChatMessage::class)
            ->execute();

        $viewData['messages'] = $messages;
        return view('channel', $viewData);
    }
}

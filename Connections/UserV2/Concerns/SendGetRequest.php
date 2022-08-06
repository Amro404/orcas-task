<?php


namespace Connections\UserV2\Concerns;


use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

trait SendGetRequest
{
    public function get(PendingRequest $request, string $url): Response
    {
        return $request->get(
            $url
        );
    }
}

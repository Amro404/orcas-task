<?php


namespace Connections\UserV2\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait BuildBaseRequest
{

    public function withBaseUrl(): PendingRequest
    {
        return Http::baseUrl(
            $this->baseUrl
        );
    }
}
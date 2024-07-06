<?php

namespace AaronGRTech\QbwcLaravel\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use AaronGRTech\QbwcLaravel\StructType\Queries\QbxmlQuery;

class SoapService
{
    protected $ticket;
    protected $cacheKey = 'qbwc_ticket';

    public function generateTicket()
    {
        $this->ticket = config('qbwc.soap.ticket_prefix') . Str::random();
        Cache::put($this->cacheKey, $this->ticket, now()->addMinutes(2));
    }

    public function getCachedTicket()
    {
        return Cache::get($this->cacheKey);
    }

    public function forgetCachedTicket()
    {
        Cache::forget($this->cacheKey);
    }

    public function validateTicket($ticket)
    {
        return $ticket == $this->ticket;
    }

    public function handleInvalidTicket($responseClass, $responseParams = null)
    {
        Log::error("Invalid ticket");
        return $responseParams ? 
            new $responseClass($responseParams) :
            $this->sendEmptyResponse($responseClass);
    }

    public function parseResponseXML($xml)
    {
        return simplexml_load_string($xml);
    }

    public function sendEmptyResponse($responseClass)
    {
        $baseQuery = new QbxmlQuery();
        $query = $baseQuery->emptyResponse();

        return new $responseClass($query);
    }

    public function getCallbackClass($data)
    {
        $callbackMap = config('qbwc.callback_map');

        foreach ($callbackMap as $responseType => $callbackClass) {
            if (isset($data->$responseType)) {
                return $callbackClass;
            }
        }

        return null;
    }
}
<?php

use Illuminate\Support\Facades\Event;
use App\Events\GiftCertificatePurchased;
use function Illuminate\Events\queueable;

Event::listen(queueable(function (GiftCertificatePurchased $event){
    dd("handling it");
}));


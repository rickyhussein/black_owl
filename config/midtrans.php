<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION'),
    'snap_url' => env('MIDTRANS_SNAP_URL'),
    'whatsapp_api_url' => env('MIDTRANS_WHATSAPP_API_URL'),
    'whatsapp_api_key' => env('MIDTRANS_WHATSAPP_API_KEY'),
    'whatsapp_sender' => env('MIDTRANS_WHATSAPP_SENDER'),
    'railway_whatsapp_api_url' => env('RAILWAY_WHATSAPP_API_URL'),
    'railway_whatsapp_api_session' => env('RAILWAY_WHATSAPP_API_SESSION'),
];

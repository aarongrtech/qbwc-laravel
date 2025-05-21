<?php

$qbwc_model_namespace = env('QBWC_MODEL_NAMESPACE') ? env('QBWC_MODEL_NAMESPACE') . '\\' : '';

return [
    'user' => env('QBWC_USER', 'Admin'),
    'password' => env('QBWC_PASSWORD'),
    'soap' => [
        'ticket_prefix' => env('QBWC_TICKET_PREFIX', 'qbwc_'),
        'wsdl' => storage_path('app/wsdl/QBWebConnectorSvc.wsdl'),
        'version' => env('QBWC_VERSION', '1.0'),
    ],
    'routes' => [
        'controller' => AaronGRTech\QbwcLaravel\Http\Controllers\SoapController::class,
        'prefix' => env('QBWC_ROUTE_PREFIX', 'soap'),
        'middleware' => []
    ],
    'callback_map' => [
        'AccountQueryRs' => \App\Callbacks\AccountCallback::class,
        'BillQueryRs' => \App\Callbacks\BillCallback::class,
        'CheckQueryRs' => \App\Callbacks\CheckCallback::class,
        'CreditMemoQueryRs' => \App\Callbacks\CreditMemoCallback::class,
        'CustomerQueryRs' => \App\Callbacks\CustomerCallback::class,
        'EmployeeQueryRs' => \App\Callbacks\EmployeeCallback::class,
        'EstimateQueryRs' => \App\Callbacks\EstimateCallback::class,
        'InvoiceQueryRs' => \App\Callbacks\InvoiceCallback::class,
        'ItemQueryRs' => \App\Callbacks\ItemCallback::class,
        'JournalEntryQueryRs' => \App\Callbacks\JournalEntryCallback::class,
        'PurchaseOrderQueryRs' => \App\Callbacks\PurchaseOrderCallback::class,
        'ReceivePaymentQueryRs' => \App\Callbacks\ReceivePaymentCallback::class,
        'SalesOrderQueryRs' => \App\Callbacks\SalesOrderCallback::class,
        'SalesReceiptQueryRs' => \App\Callbacks\SalesReceiptCallback::class,
        'VendorQueryRs' => \App\Callbacks\VendorCallback::class,
    ],
    'model_map' => [
        'Account' => 'App\\Models\\' . $qbwc_model_namespace . 'Account',
        'Bill' => 'App\\Models\\' . $qbwc_model_namespace . 'Bill',
        'Check' => 'App\\Models\\' . $qbwc_model_namespace . 'Check',
        'Credit' => 'App\\Models\\' . $qbwc_model_namespace . 'Credit',
        'Customer' => 'App\\Models\\' . $qbwc_model_namespace . 'Customer',
        'Employee' => 'App\\Models\\' . $qbwc_model_namespace . 'Employee',
        'Estimate' => 'App\\Models\\' . $qbwc_model_namespace . 'Estimate',
        'Invoice' => 'App\\Models\\' . $qbwc_model_namespace . 'Invoice',
        'Item' => 'App\\Models\\' . $qbwc_model_namespace . 'Item',
        'JournalEntry' => 'App\\Models\\' . $qbwc_model_namespace . 'JournalEntry',
        'PurchaseOrder' => 'App\\Models\\' . $qbwc_model_namespace . 'PurchaseOrder',
        'ReceivePayment' => 'App\\Models\\' . $qbwc_model_namespace . 'ReceivePayment',
        'SalesOrder' => 'App\\Models\\' . $qbwc_model_namespace . 'SalesOrder',
        'SalesReceipt' => 'App\\Models\\' . $qbwc_model_namespace . 'SalesReceipt',
        'Vendor' => 'App\\Models\\' . $qbwc_model_namespace . 'Vendor'
    ],
    'files' => [
        // 'file' => "path/to/your/file",
    ]
];
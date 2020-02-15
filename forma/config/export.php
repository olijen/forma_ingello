<?php

/* @var $class \kartik\export\ExportMenu */
$class = \kartik\export\ExportMenu::className();

$pdfHeader = [
    'L' => [
        'content' => 'Yii2 Grid Export (Я полковник)',
        'font-size' => 8,
        'color' => '#333333',
    ],
    'C' => [
        'content' => 'Grid Export',
        'font-size' => 16,
        'color' => '#333333',
    ],
    'R' => [
        'content' => 'Generated' . date('D, d-M-Y g:i a T'),
        'font-size' => 8,
        'color' => '#333333',
    ],
];

$pdfFooter = [
    'L' => [
        'content' => '© Krajee Yii2 Extensions',
        'font-size' => 8,
        'font-style' => 'B',
        'color' => '#999999',
    ],
    'R' => [
        'content' => '[ {PAGENO} ]',
        'font-size' => 10,
        'font-style' => 'B',
        'font-family' => 'serif',
        'color' => '#333333',
    ],
    'line' => true,
];

$pdf = [
    'label' => 'PDF',
    'icon' => 'file-pdf-o',
    'iconOptions' => ['class' => 'text-danger'],
    'linkOptions' => [],
    'options' => ['title' => 'Portable Document Format'],
    'alertMsg' => 'The PDF export file will be generated for download.',
    'mime' => 'application/pdf',
    'extension' => 'pdf',
    'writer' => 'HTML',
    'useInlineCss' => true,
    'pdfConfig' => [
        'methods' => [
            'SetHeader' => [
                ['odd' => $pdfHeader, 'even' => $pdfHeader],
            ],
            'SetFooter' => [
                ['odd' => $pdfFooter, 'even' => $pdfFooter],
            ],
        ],
    ],
];

return [
    $class::FORMAT_PDF => $pdf,
];

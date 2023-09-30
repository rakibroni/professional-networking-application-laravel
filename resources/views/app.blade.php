<?php

$isWebView = false;
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false):
    $isWebView = true;
elseif (isset($_SERVER['HTTP_X_REQUESTED_WITH'])):
    $isWebView = true;
endif;

$isAndroid = false;
if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Android')) {
    header('Location: https://play.google.com/store/apps/details?id=webviewgold.curawork&gl=DE');
    exit();
} else {
    header('Location: https://apps.apple.com/de/app/curawork/id1580785461');
    exit();
}

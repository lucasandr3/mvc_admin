<?php
use Symfony\Config\FrameworkConfig;

return static function (FrameworkConfig $framework) {
    $framework->notifier()
        ->chatterTransport('slack', '%env(SLACK_DSN)%')
    ;
};
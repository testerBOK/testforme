<?php

/**
 * activate cron jobs
 */

function changenowio_5min_interval($sched)
{
    $sched['changenowio_5_min'] = [
        'interval' => 300,
        'display' => 'Every 5 min'
    ];
    return $sched;
}

add_filter('cron_schedules', 'changenowio_5min_interval');

function cronstarter_activation_changenowio()
{
    if (!wp_next_scheduled(CHANGENOWIO_CRON_NAME)) {
        wp_schedule_event(time(), 'changenowio_5_min', CHANGENOWIO_CRON_NAME);
    }
}

add_action('wp', 'cronstarter_activation_changenowio');

add_action(CHANGENOWIO_CRON_NAME, 'changenowio_get_prices_search');

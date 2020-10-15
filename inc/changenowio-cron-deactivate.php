<?php

/**
 * de-activate cron jobs
 */

function cronstarter_deactivation_changenowio()
{
    $timestamp = wp_next_scheduled(CHANGENOWIO_CRON_NAME);
    wp_unschedule_event($timestamp, CHANGENOWIO_CRON_NAME);
}

register_deactivation_hook(__FILE__, 'cronstarter_deactivation_changenowio');

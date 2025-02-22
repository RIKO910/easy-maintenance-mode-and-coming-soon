<?php

    $message = get_option('emm_message', 'We are currently undergoing maintenance. Please check back later.');
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo esc_html__('Maintenance Mode', 'easy-maintenance-mode-and-coming-soon')?></title>
        <?php wp_head(); ?>
    </head>
    <body>
    <div class="maintenance-container">
        <h1><?php echo esc_html__('Website Under Maintenance', 'easy-maintenance-mode-and-coming-soon')?></h1>
        <p><?php echo esc_html($message); ?></p>
    </div>
    </body>
    </html>
    <?php
    exit;
?>

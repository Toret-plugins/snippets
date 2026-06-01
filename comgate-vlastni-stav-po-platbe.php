<?php
/**
 * Comgate (Toret plugins) – vlastní stav objednávky po zaplacení
 * --------------------------------------------------------------
 * Po úspěšné platbě (Comgate stav PAID) nastaví objednávku do vámi
 * zvoleného stavu místo výchozího "processing" (Zpracovává se).
 *
 * Kód vložte do functions.php aktivní (child) šablony nebo lépe do
 * vlastního mini-pluginu / Code Snippets pluginu.
 *
 * Slug stavu uvádějte BEZ předpony "wc-" (např. on-hold, completed,
 * nebo slug vlastního stavu vytvořeného jiným pluginem). Cílový stav
 * musí ve WooCommerce existovat.
 *
 * Funkční s pluginem Toret Comgate v5.x.
 */

add_filter('tcomgate_paid_order_status', function ($new_status, $comgate_status, $order) {
    if ($comgate_status === 'PAID') {
        $new_status = 'on-hold'; // <-- ZDE nahraďte cílovým stavem
    }
    return $new_status;
}, 10, 3);

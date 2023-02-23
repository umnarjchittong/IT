<?php

function language_switch($language) {
    global $language_pack_en, $language_pack_th;
    $_SESSION["member"]["language"] = $language;
}


$language_pack_en = array(
    // side panel
    "overview" => "Overview",
    "home-charge" => "Home Charge",
    "ev-station" => "EV Station",
    "road-trip" => "Road Trip",
    "links" => "Links",
    "members" => "Members",
    "settings" => "Settings",
    // header panel
    "contact" => "Contact Admin",
    "view-logs" => "View Logs",
    "log-out" => "Log Out",
    // home charge
    "charging-hr" => "Charging Hrs.",
    "submit" => "OK",
    // charged cost
    "charged-cost-title" => "Charged Cose",
    "charged-cost-table-percent" => "Batt (%)",
    "charged-cost-table-kw" => "Kw",
    "charged-cost-table-km" => "Km",
    "charged-cost-table-baht" => "฿"
);

$language_pack_en = array();

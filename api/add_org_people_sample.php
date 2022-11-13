<?php












$jsonsample = '[{"firstname":"Kath","middlename":"Evonne","lastname":"Bromwich","email":"ebromwich0@wired.com","course":"Maybach","yrlvl":"1st"},
{"firstname":"Angie","middlename":"Giulia","lastname":"Goschalk","email":"ggoschalk1@biblegateway.com","course":"Eagle","yrlvl":"1st"},
{"firstname":"Jo-anne","middlename":"Phelia","lastname":"Beckford","email":"pbeckford2@dyndns.org","course":"Volkswagen","yrlvl":"1st"},
{"firstname":"Carin","middlename":"Lindie","lastname":"Twidale","email":"ltwidale3@cnet.com","course":"Mercedes-Benz","yrlvl":"1st"}]';

$data = '[{"key":"val"},
{"nasdw":"dasdwd"}]';

$jason = json_decode($jsonsample, true);
echo $jason[0]["firstname"];
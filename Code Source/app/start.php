<?php 

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AZ6D9vQImsOPsCtMUuROgl0KDnUJcecrYz_iFCANKW4J16E88hOH-P547sxju_qcj5A5tQwS0kOmNbO7',
        'EDzmiVdnaTPpqSN2saev8ufcd1MTYVDrJ64OVfxVa5quHowiGp_X2NaGfxBx1CTSjQyWloDppTaRkZ0W'
    )
); 
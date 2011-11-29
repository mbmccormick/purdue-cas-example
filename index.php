<?php

    include_once('CAS.php');

    phpCAS::setDebug();
    phpCAS::client(CAS_VERSION_2_0, 'www.purdue.edu', 443, '/apps/account/cas');
    // phpCAS::client(CAS_VERSION_2_0, 'webservices-test.itns.purdue.edu', 443, '/apps/account/cas-server-uber-webapp-3.4.6');

    phpCAS::setNoCasServerValidation();

    phpCAS::forceAuthentication();

    if (isset($_REQUEST['logout']))
    {
        phpCAS::logout();
    }

?>
<html>
<head>
    <title>Purdue CAS Example</title>
</head>
<body>
    <h1>Authentication Succeeded</h1>
    <p>
        Hello, <b><?php echo phpCAS::getAttribute('fullname'); ?></b>!
    </p>
    <p>
        Your username is <b><?php echo phpCAS::getUser(); ?></b>. Your email address is <b><?php echo phpCAS::getAttribute('email'); ?></b>. Your PUID is <b><?php echo phpCAS::getAttribute('puid'); ?></b>. Your I2A2 characteristics are <b><?php echo phpCAS::getAttribute('i2a2characteristics'); ?></b>.
    </p>
    <p>
        <a href="?logout=">Logout</a>
    </p>
</body>
</html>

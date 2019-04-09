<?php
require '';

if (isset($_GET['rel'])) {

    $controller = ucfirst($_GET['rel']) . 'Controller::class';


}
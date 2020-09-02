<?php
require 'vendor/autoload.php';
use Tracy\Debugger;
Debugger::enable();

use RizekWatch\Controller;

new Controller();

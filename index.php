<?php

session_start();

require('./utility/index.php');
require('vendor/autoload.php');

require(basePath('controller/index.php'));

require(basePath('router/index.php'));


?>


<a type="button" href='loadDetailData'  class="py-2 px-3 inline-flex fixed top-0 right-0  items-center gap-x-2 text-sm font-semibold
 rounded-lg border border-transparent bg-red-600 
 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
  Load default data
</a>
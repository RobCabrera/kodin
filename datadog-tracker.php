<?php

 # Require the datadogstatsd.php library file
require "../../php-datadogstatsd/libraries/datadogstatsd.php";


# Increment a counter.
DataDogStatsD::increment('web.page_views');
DataDogStatsD::histogram('web.render_time', 15);
DataDogStatsD::set('web.uniques', 3 /* a unique user id */);

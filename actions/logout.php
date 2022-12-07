<?php

require ('../boot.php');

unset($_SESSION['user_id']);
redirect('../index.php');
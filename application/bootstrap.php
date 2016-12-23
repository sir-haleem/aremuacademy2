<?php


    
$config  = require './cloned/config/config.php';

require './cloned/view/view.php';

require './cloned/db/db.php';

require './cloned/post/post.php';

require './cloned/user/user.php';

require './cloned/base/Configurable.php';

require './cloned/base/Object.php';

require './cloned/base/Component.php';

require './cloned/base/Security.php';

require './cloned/request/request.php';

require './cloned/helper/validator.php';

require './cloned/cloned.php';



	$app = Cloned::load();
	
	$app::init_app($config);



    
header('Content-Type: application/json');



?>
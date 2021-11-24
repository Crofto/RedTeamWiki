<?php

function base(){
    echo str_replace("index.php", "", $_SERVER['PHP_SELF']);
}

?>


<a href = '<?php base()?>home'>Home</a>
<a href = '<?php base()?>truc'>Truc</a>
<a href = '<?php base()?>posts'>Posts</a>



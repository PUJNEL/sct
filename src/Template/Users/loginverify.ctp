<?php if($data=="0") {?>
	{"error":"login fail"}
<?php } else { ?>
	{"user":<?=$data?>}
<?php } ?>
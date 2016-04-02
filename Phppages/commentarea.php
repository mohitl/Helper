

<TEXTAREA NAME="comment_msg" COLS=50 ROWS=3 placeholder="comment" id="comment_<?php echo "$row[id]"; ?>"></TEXTAREA> 
<INPUT type="button" name=com_msg VALUE="Post" onClick=apply_post(<?php echo "$row[id]"; ?>)> 

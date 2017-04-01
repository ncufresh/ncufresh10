<?php
switch($_POST['selected']){
	case "text":
		echo '
			<span><input type="text" value="their answer" disabled="disabled" /></span>
		';
	break;
	case "paragragh":
		echo '
			<textarea disabled="disabled">their longer answer</textarea>
		';
	break;
	case "multiple choice":
		echo '
			<ul>
			<li><input type="radio" /><input type="text" value="option" name="op"/></li>
			<li><input type="radio" disabled="disabled" /><input type="text" value="option" name="op" disabled="disabled/></li>
			</ul>
		';
	break;
}
?>
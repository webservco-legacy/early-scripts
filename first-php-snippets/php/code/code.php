<html><head><title>tt</title>
<script language="JavaScript" type="text/javascript" src="code.js"></script>
</head>
<body class="main_content">
<form action='' method='post' name='bb_code_form' id='bb_code_form'>

<a href="javascript:void(0);" onclick="surroundText('[b]', '[/b]', document.bb_code_form.bb_box); return false;">bold</a>
&nbsp;|&nbsp;
<SELECT onChange="surroundText('[color='+this.options[this.selectedIndex].value+']', '[/color]', document.bb_code_form.bb_box); this.selectedIndex = 0;">
<option value="" selected="selected">Change Color</option>
<option value="Black">Black</option>
<option value="Red">Red</option>
<option value="Yellow">Yellow</option>
<option value="Pink">Pink</option>
<option value="Green">Green</option>
<option value="Orange">Orange</option>
<option value="Purple">Purple</option>
<option value="Blue">Blue</option>
<option value="Beige">Beige</option>
<option value="Brown">Brown</option>
<option value="Teal">Teal</option>
<option value="Navy">Navy</option>
<option value="Maroon">Maroon</option>
<option value="LimeGreen">Lime Green</option>
</SELECT>
&nbsp;|&nbsp;
<a href="javascript:void(0);" onclick="replaceText(' :) ', document.bb_code_form.bb_box); return false;">Smiley</a>
&nbsp;|&nbsp;
<a href="javascript:void(0);" onclick="replaceText('&#259;', document.bb_code_form.bb_text); return false;">&#259;</a>

<BR>  
<textarea cols="50" rows="8" name="bb_box" id="bb_box" onSelect="storeCaret(this);" onChange="storeCaret(this);" onClick="storeCaret(this);" onKeyUp="storeCaret(this);"></textarea>
<input type="text" name="bb_text" id="bb_text" onSelect="storeCaret(this);" onChange="storeCaret(this);" onClick="storeCaret(this);" onKeyUp="storeCaret(this);" value="">
</form></body></html>
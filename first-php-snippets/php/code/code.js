function storeCaret(text) {
	if (typeof(text.createTextRange) != 'undefined')
		text.caretPos = document.selection.createRange().duplicate();
}
function replaceText(text, form_element) {
	if (typeof(form_element.caretPos) != "undefined" && form_element.createTextRange)
	{
		var caretPos = form_element.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
		caretPos.select();
	}
	else if (typeof(form_element.selectionStart) != "undefined")
	{
		var begin = form_element.value.substr(0, form_element.selectionStart);
		var end = form_element.value.substr(form_element.selectionEnd);
		var scrollPos = form_element.scrollTop;
		form_element.value = begin + text + end;
		if (form_element.setSelectionRange)
		{
			form_element.focus();
			form_element.setSelectionRange(begin.length + text.length, begin.length + text.length);
		}
		form_element.scrollTop = scrollPos;
	}
	else
	{
		form_element.value += text;
		form_element.focus(form_element.value.length - 1);
	}
}
function surroundText(text1, text2, form_element) {
	if (typeof(form_element.caretPos) != "undefined" && form_element.createTextRange)
	{
		var caretPos = form_element.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text1 + caretPos.text + text2 + ' ' : text1 + caretPos.text + text2;
		caretPos.select();
	}
	else if (typeof(form_element.selectionStart) != "undefined")
	{
		var begin = form_element.value.substr(0, form_element.selectionStart);
		var selection = form_element.value.substr(form_element.selectionStart, form_element.selectionEnd - form_element.selectionStart);
		var end = form_element.value.substr(form_element.selectionEnd);
		var newCursorPos = form_element.selectionStart;
		var scrollPos = form_element.scrollTop;
		form_element.value = begin + text1 + selection + text2 + end;
		if (form_element.setSelectionRange)
		{
			if (selection.length == 0)
				form_element.setSelectionRange(newCursorPos + text1.length, newCursorPos + text1.length);
			else
				form_element.setSelectionRange(newCursorPos, newCursorPos + text1.length + selection.length + text2.length);
			form_element.focus();
		}
		form_element.scrollTop = scrollPos;
	}
	else
	{
		form_element.value += text1 + text2;
		form_element.focus(form_element.value.length - 1);
	}
}
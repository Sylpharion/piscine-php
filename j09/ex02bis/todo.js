var list = $('#new').val();
var i = 0;

$("#ft_list").click(function()
{
  if (confirm("Really ?"))
	{
		var todo = $('#ft_list');
		todo.remove();
		setCookie('todo', todo.innerHTML, 1);
  }
});

function setCookie(cname, cvalue, exdays)
{
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname)
{
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ')
      c = c.substring(1);
		if (c.indexOf(name) == 0)
      return c.substring(name.length,c.length);
	}
	return "";
}

$('#new').click(function()
{
  var new_todo = prompt("Make your dreams come true.. JUST DO IT!");
  if (new_todo.length > 0)
  {
    $("#ft_list").prepend( "<div class='" + i + "';>" + new_todo + "</div>" );
			var coucou = $("#ft_list").html();
			setCookie('todo', coucou, 1);
		i++;
  }
});

function liste()
{
  var todo = $('#ft_list').val();
	todo.innerHTML = getCookie('todo');
}

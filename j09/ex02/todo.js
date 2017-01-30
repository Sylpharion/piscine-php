var list = document.getElementById('new');
list.addEventListener("click", liste);
list.addEventListener("click", add_todo);
var i = 0;

function del_todo(i)
{
  if (confirm("Really ?"))
	{
		var todo = document.getElementById('ft_list');
		todo.removeChild(i);
		setCookie('todo', todo.innerHTML, 1);
  }
}

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

function add_todo()
{
  var new_todo = prompt("Make your dreams come true.. JUST DO IT!");
  if (new_todo.length > 0)
  {
    var content = document.getElementById('ft_list');
		var child = document.createTextNode(new_todo);
		var div = document.createElement("div");
		div.appendChild(child);
		div.setAttribute("id", i)
    div.setAttribute("class", "child")
		div.setAttribute("onclick", "del_todo(this)")
		content.insertBefore(div, content.firstChild);
		date= new Date;
		date.setMonth(date.getMonth()+1);
		date = date.toUTCString();
		setCookie('todo', content.innerHTML, 1);
		i++;
  }
}

function liste()
{
  var todo = document.getElementById('ft_list');
	todo.innerHTML = getCookie('todo');
}

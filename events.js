var c=0;
var t;
var timer_is_on=0;
function LoadEvents(Count, EventImage)
{
	window.EventImage = EventImage;
	window.EventCount = Count;
	window.CurrentEvent = 0;
	ChangeEvent(window.CurrentEvent,false)
	EventTimedCount();
	
}
function NextEvent()
{
	if(window.CurrentEvent < window.EventCount - 1)
	{
		window.CurrentEvent ++;	
	}
	else
	{
		window.CurrentEvent = 0;
	}
	ChangeEvent(window.CurrentEvent, false);
}
function EventTimedCount()
{
	if(c == 10)
	{
		c = 0;
		NextEvent();
	}
	else
	{
		c=c+1;
	}
	t=setTimeout("EventTimedCount()",1000);
}
function StopEventCount()
{
	clearTimeout(t);
	timer_is_on=0;
}
function ChangeEvent(ID, Stop)
{
	if(Stop)
	{
		StopEventCount();
	}
	//remember that ID starts at 0!
	var EventImage = new Image();
	EventImage.src = window.EventImage;
	document.getElementById("event-box").style.backgroundPosition = "0px "+ ((EventImage.height/window.EventCount)*ID)*-1 + "px";
	document.getElementById("active-event-button").href=document.getElementById("event-"+ID+"-url").value;
}
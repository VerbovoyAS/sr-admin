var now, dd, td;
var months = ["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
var days = ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"];

document.addEventListener("DOMContentLoaded", init, false);
function init(){
dd = document.getElementById("date");
td = document.getElementById("time");
updateTime();
setInterval(updateTime,1000);
}
function updateTime(){
var clockdata = getClockStrings();
dd.innerHTML = clockdata.datehtml;
td.innerHTML = clockdata.timehtml;
dd.dateTime = now.toISOString();
td.dateTime = now.toISOString();
}
function getClockStrings(){
now = new Date();
var year = now.getFullYear();
var month = months[now.getMonth()];
var date = now.getDate();
var day = days[now.getDay()];
var hour = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();
var meridian = hour < 24 ? "AM" : "PM"; //
var clockhour = hour > 24 ? hour - 24 : hour;
if (hour === 0) {clockhour = 24;}
var clockminutes = minutes < 10 ? "0" + minutes : minutes;
var clockseconds = seconds < 10 ? "0" + seconds : seconds;
var datehtml = day + ", " + month + " " + date + ", " + year;
var timehtml = clockhour + ":" + clockminutes + "<span>:" + clockseconds + "</span>";
return {"datehtml":datehtml,"timehtml":timehtml};
}
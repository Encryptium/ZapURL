//get date
var d = new Date();
//get the current year
var curr_y = d.getFullYear();
//get the current day 
var curr_d = d.getDate();
//get the current month
var curr_m = d.getMonth() + 1;

curr_y = curr_y.toString();
curr_d = curr_d.toString();
curr_m = curr_m.toString();


$.get('sys/Frameworks/management/sys_check.txt', function(data) {
   const data_split = data.split(/\s*\/\s*/g);
   var sys_month = data_split[0];
   var sys_day = data_split[1];
   var sys_year = data_split[2];
   if (curr_y == sys_year) {
     if (curr_m == sys_month) {
       if (curr_d < sys_day) {
         document.getElementById("parent").innerHTML = "[INFO] We are having a system check on " + data + ". All stored URL's will be put out of service and back in circulation.";
       } else {
         document.getElementById("parent").innerHTML = "";
       }
     } else {
       // Don't show anything 
       document.getElementById("parent").innerHTML = "";
     }
   } else {
     document.getElementById("parent").innerHTML = "";
   }
}, 'text');
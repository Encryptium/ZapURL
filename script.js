function Copy(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  document.getElementById("copytext").innerHTML = "Link Copied";
}

var i=0;
setInterval(function(){
    var titles=['URL Shortener', 'URL Hider', 'URL Changer'];//add more titles if you want
    if(i===titles.length) {
        i=0;
    }
    document.title = titles[i];
    i++;
}, 5000);


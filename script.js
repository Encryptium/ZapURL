var selCount = 0;

$(document).ready(function () {
  $("h1").slideUp();
  $("h1").slideDown();
  $("#again").hide();
  $("#again").delay(3000).slideDown();
  setTimeout("$('#link').css('border', 'none');",7500);
  document.getElementById("cu-sel").addEventListener('click', function () {
    if (selCount % 2 == 0){
      document.getElementById("cu-dir").style.display = 'block';
      $("#cu-dir").hide();
      $("#cu-dir").slideDown();
    } else {
      $("#cu-dir").slideUp();
      
    }
    selCount++;
  })
})



function Copy(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

  if (element == "#link") {
    document.getElementById("copytext").innerHTML = "Link Copied";
  }
  else if (element == "#error") {
    document.getElementById("copyerror").innerHTML = "Error Message Copied";
  }
  
}

if (document.URL.includes("create.php")) {
  //var counter = 0;

  $(document).ready(function() {
    document.title = "Copy Zapped URL";
  });
  
  
} else {
    var j=0;
  setInterval(function(){
    var titles2=['URL Shortener', 'URL Hider', 'URL Changer'];//add more titles if you want
    if(j===titles2.length) {
        j=0;
    }
    document.title = titles2[j];
    j++;
  }, 5000);
}



setInterval(function() {
  var currInput = document.getElementsByName("urlin")[0].value;

  var newInput = currInput.replace(/ /g, "");

  document.getElementsByName("urlin")[0].value = newInput;
})


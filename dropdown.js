var counter = 0;

function dropDown(dropDown) {

    

  if (counter % 2 == 0){
    document.getElementById(dropDown).style.display = 'block';

    $(".dropdown-content").hide();
    $(".dropdown-content").slideDown();
    document.getElementById("down-arrow").innerHTML = "▼";
  } else {
    $(".dropdown-content").slideUp();
    document.getElementById(dropDown).style.display = 'hide';
    document.getElementById("down-arrow").innerHTML = "►";
  }

  counter++;

}
// Add active class to the current button (highlight it)
// var header = document.getElementById("myDIV");
// var btns = header.getElementsByClassName("btn");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace("active", "");
//   this.className += " active";
//   });
// }


// var vid = document.getElementById("myVideo");
// function enableAutoplay() { 
// vid.autoplay = true;
// vid.load();
// }


// $(document).ready(enableAutoplay);

var hambarMobileOpenBtn = document.getElementById('hambarMobileOpenBtn');
var resMenuPanel = document.querySelector('.resMenuPanel');
var resHambarClose = document.querySelector('.resHambarClose');

if(hambarMobileOpenBtn){
hambarMobileOpenBtn.onclick = function(){
  resMenuPanel.style.transform = 'translateX(0)';
}
}


if(resHambarClose){
resHambarClose.onclick = function(){
  resMenuPanel.style.transform = 'translateX(270px)';
}
}




                


var hambarOpenBtn = document.getElementById('hambarOpenBtn');
var fullNavSec = document.querySelector('.fullNavSec');
var hambargerOpen = document.querySelector('.hambargerOpen');

function toggleItem(elem) {
  for (var i = 0; i < elem.length; i++) {
    elem[i].addEventListener("click", function(e) {
      var current = this;
      for (var i = 0; i < elem.length; i++) {
        if (current != elem[i]) {
          elem[i].classList.remove('active');
        } else if (current.classList.contains('active') === true) {
          current.classList.remove('active');

          //console.log('Close');
          fullNavSec.style.display = 'none';

        } else {
          current.classList.add('active')

          //console.log('Open');
            fullNavSec.style.display = 'block';

          }
      }
      e.preventDefault();
    });
  };

  
}
toggleItem(document.querySelectorAll('.hambargerOpen'));



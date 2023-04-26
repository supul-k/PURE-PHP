window.addEventListener('load', startTimer, menulink);
	/* startTimer();
	showSlides();
	menulink () */;
	
	

(function() {
  var imgLen = document.getElementById('imgGallary');
  var images = imgLen.getElementsByTagName('img');
  var counter = 1;

  if (counter <= images.length) {
    setInterval(function() {
      images[0].src = images[counter].src;
      console.log(images[counter].src);
      counter++;

      if (counter === images.length) {
        counter = 1;
      }
    }, 4000);
  }
})();



function menulink (){

var currentUrl = window.location.href;
var menuLinks = document.getElementsByTagName("a");

for (var i = 0; i < menuLinks.length; i++) {
  if (menuLinks[i].href === currentUrl) {
    menuLinks[i].classList.add("active");
  }
}
}



function startTimer() {
  var timeLeft = 600; // 10 minutes in seconds
  var timerElement = document.getElementById("timer");

  var countdown = setInterval(function() {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;

    if (seconds < 10) {
      seconds = "0" + seconds;
    }

    timerElement.innerHTML = minutes + ":" + seconds;

    timeLeft--;

    if (timeLeft < 0) {
      clearInterval(countdown);
      alert("Time's up! Your application has been cancelled.");
      window.location.href = "index.html";
    }
  }, 1000);
}

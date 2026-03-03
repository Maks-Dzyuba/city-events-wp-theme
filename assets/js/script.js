window.onscroll = function () {
  var header = document.querySelector(".header");

  if (window.pageYOffset > 50) {
    header.style.background = "#000000";
    header.style.padding = "10px 0";
  } else {
    header.style.background = "transparent";
    header.style.padding = "25px 0";
  }
};

var cards = document.querySelectorAll(".event-card");

cards.forEach(function (card) {
  card.onmouseenter = function () {
    card.style.borderColor = "#ff6b00";
  };

  card.onmouseleave = function () {
    card.style.borderColor = "rgba(255, 255, 255, 0.1)";
  };
});

var scrollBtn = document.querySelector('a[href*="#contact"]');

if (scrollBtn) {
  scrollBtn.onclick = function (e) {
    var isHomePage =
      window.location.pathname === "/" ||
      window.location.pathname === "/index.php";

    if (isHomePage) {
      e.preventDefault();
      var contactSection = document.querySelector("#contact");
      if (contactSection) {
        contactSection.scrollIntoView({
          behavior: "smooth",
        });
      }
    }
  };
}

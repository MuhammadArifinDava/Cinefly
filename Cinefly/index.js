let accordian = document.getElementsByClassName("FAQ__title");

for (let i = 0; i < accordian.length; i++) {
  accordian[i].addEventListener("click", function () {
    if (this.childNodes[1].classList.contains("fa-plus")) {
      this.childNodes[1].classList.remove("fa-plus");
      this.childNodes[1].classList.add("fa-times");
    } else {
      this.childNodes[1].classList.remove("fa-times");
      this.childNodes[1].classList.add("fa-plus");
    }

    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

document.addEventListener('DOMContentLoaded', () => {
  const getStartedBtn = document.getElementById('getStartedBtn');
  const emailInput = document.getElementById('landingEmail');

  if (getStartedBtn && emailInput) {
    getStartedBtn.addEventListener('click', function () {
      const emailValue = emailInput.value.trim();
      if (emailValue) {
        window.location.href = `login.php?email=${encodeURIComponent(emailValue)}`;
      } else {
        alert("Please enter your email.");
      }
    });
  }
});


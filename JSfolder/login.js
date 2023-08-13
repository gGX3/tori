const form = document.querySelector(".login form"),
      continueBtn = form.querySelector(".button input"),
      errorText = form.querySelector(".error-txt");

form.addEventListener("submit", (e) => {
    e.preventDefault();
});

continueBtn.addEventListener("click", () => {
    const formData = new FormData(form);

    fetch("../php/login.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        if (data === "success") {
            window.location.replace("usersArea.php");
        } else {
            errorText.textContent = data;
            errorText.style.display = "block";
        }
    })
    .catch(error => {
        console.error("An error occurred:", error);
    });
});

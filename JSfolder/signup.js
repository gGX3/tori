const form = document.querySelector(".signup form");
const continueBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-txt");

form.addEventListener("submit", (e) => {
    e.preventDefault();
});

continueBtn.addEventListener("click", async () => {
    try {
        const formData = new FormData(form);
        const response = await fetch("../php/Signup.php", {
            method: "POST",
            body: formData,
        });

        if (response.ok) {
            const data = await response.json();
            console.log(data);

            if (data.success) {
                window.location.replace("verifyArea.php");
            } else {
                errorText.textContent = data.message;
                errorText.style.display = "block";
            }
        } else {
            console.error("Error:", response.statusText);
        }
    } catch (error) {
        console.error("Error:", error);
    }
});

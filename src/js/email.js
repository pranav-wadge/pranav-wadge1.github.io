document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contact-form");
  const status = document.getElementById("form-status");
  const popup = document.querySelector(".popup");
  const closeBtn = document.querySelector(".popup .close");

  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    // Get values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Simple validation
    if (!name || !email || !message) {
      status.textContent = "⚠️ Please fill in all fields.";
      status.style.color = "red";
      return;
    }

    // Send to Formspree
    const formData = new FormData(form);

    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: formData,
        headers: { Accept: "application/json" },
      });

      if (response.ok) {
        popup.style.display = "block"; // Show popup
        form.reset(); // Clear fields
        status.textContent = "";
      } else {
        status.textContent = "❌ Oops! Something went wrong.";
        status.style.color = "red";
      }
    } catch (err) {
      status.textContent = "❌ Network error. Please try again.";
      status.style.color = "red";
    }
  });

  // Close popup
  closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
  });
});

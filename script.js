// JavaScript to handle form submission
document.getElementById("send-button").addEventListener("click", function () {
    // Collect form data
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    // Validate the form
    if (!name || !email || !message) {
        alert("Please fill out all fields.");
        return;
    }

    // Create the subject and body for the email
    const subject = encodeURIComponent(`New Contact Form Submission from ${name}`);
    const body = encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`);

    // Create the mailto link
    const mailtoLink = `mailto:stelios.yolokrom@gmail.com?subject=${subject}&body=${body}`;

    // Open the mailto link in the user's default email client
    window.location.href = mailtoLink;

    // Optionally, reset the form after clicking send
    document.getElementById("contact-form").reset();
});



// Menangani form submit
document.getElementById("registrationForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Ambil semua data input dari form
    const userData = {
        fullname: document.getElementById("fullname").value,
        email: document.getElementById("email").value,
        username: document.getElementById("username").value,
        password: document.getElementById("password").value,
        gender: document.getElementById("gender").value,
        birthdate: document.getElementById("birthdate").value
    };

    // Simpan data ke localStorage
    localStorage.setItem("userData", JSON.stringify(userData));

    // Arahkan ke halaman hasil
    window.location.href = "result.html";
});

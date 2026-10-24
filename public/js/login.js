const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function() {
    const isPassword = passwordInput.type === "password";

    passwordInput.type = isPassword ? "text" : "password";

    togglePassword.setAttribute(
        "aria-label",
        isPassword ? "Sembunyikan password" : "Tampilkan password"
    );
});

document.getElementById("loginForm").addEventListener(
    "submit",
    function(event) {
        event.preventDefault();
        alert("Tampilan login berhasil! Hubungkan form ke backend untuk autentikasi.");
    }
);
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtns = document.querySelectorAll("#pass-toggle-btn");
    
    toggleBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const passwordInput = btn.previousElementSibling;
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                btn.classList.remove("fa-eye");
                btn.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                btn.classList.remove("fa-eye-slash");
                btn.classList.add("fa-eye");
            }
        });
    });
});

function validateForm() {
    const newPassword = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    if (newPassword !== confirmPassword) {
        alert("Las contraseñas no coinciden");
        return false;
    }

    return true;
}
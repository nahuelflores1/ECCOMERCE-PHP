const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const wrapper = document.querySelector(".wrapper");

loginLink.addEventListener("click", () => {
  loginForm.style.display = "block";
  registerForm.style.display = "none";
});

registerLink.addEventListener("click", () => {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
});


///////////////////////////////////////////////////


const userIcon = document.getElementById('user-icon');

  userIcon.addEventListener('click', () => {
    wrapper.classList.toggle('hidden');
  });

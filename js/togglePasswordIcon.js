//This is a function to allow the user to see their password. There is an icon which can be clicked and it changes the type of the field in HTML
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('.password');

togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye slash icon
  this.classList.toggle('fa-eye-slash');
});
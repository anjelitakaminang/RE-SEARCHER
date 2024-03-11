// Fungsi untuk mengecek apakah ada data "remember me" yang tersimpan
window.onload = function() {
    var rememberedUsername = localStorage.getItem('rememberedUsername');
    var rememberedPassword = localStorage.getItem('rememberedPassword');

    if (rememberedUsername && rememberedPassword) {
      document.getElementById('email').value = rememberedUsername;
      document.getElementById('password').value = rememberedPassword;
      document.getElementById('rememberMe').checked = true;
    }
  };
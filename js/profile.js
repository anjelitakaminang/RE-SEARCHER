// Mengambil data profil pengguna dari backend PHP
fetch('get_profile.php')
  .then(response => response.json())
  .then(data => {
    // Menampilkan data profil pengguna dalam elemen #profile
    document.getElementById('profile').innerHTML = `
      <p><strong>Full Name:</strong> ${data.fullname}</p>
      <p><strong>Username:</strong> ${data.username}</p>
      <p><strong>Email:</strong> ${data.email}</p>
      <p><strong>Password:</strong> ${data.password}</p>
    `;
  });
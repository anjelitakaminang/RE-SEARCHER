// Masuk.js
import React from 'react';

function Masuk() {
  const handleFocus = (element) => {
    element.placeholder = '';
  };

  const handleBlur = (element) => {
    if (element.value === '') {
      element.placeholder = element.id === 'email' ? 'Masukkan email mahasiswa' : 'Masukkan kata sandi';
    }
  };

  const KonfirmasiLogin = () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email === 'email' && password === 'password') {
      alert('Berhasil Masuk.');
    } else {
      alert('Email atau Kata Sandi belum tepat.');
    }
  };

  return (
    <form id="Masuk">
      <label htmlFor="email">Email Mahasiswa</label>
      <input
        type="text"
        id="email"
        name="email"
        placeholder="Masukkan email mahasiswa"
        onFocus={(e) => handleFocus(e.target)}
        onBlur={(e) => handleBlur(e.target)}
        required
      />

      <label htmlFor="password">Kata Sandi</label>
      <input
        type="password"
        id="password"
        name="password"
        placeholder="Masukkan kata sandi"
        onFocus={(e) => handleFocus(e.target)}
        onBlur={(e) => handleBlur(e.target)}
        required
      />

      <button type="button" onClick={KonfirmasiLogin}>
        Masuk
      </button>
    </form>
  );
}

export default Masuk;

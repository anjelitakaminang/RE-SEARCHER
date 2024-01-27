// App.js
import React from 'react';
import './App.css';
import Masuk from './Masuk';
import unklabLogo from './unklab_logo.png';

function App() {
  return (
    <div>
      <header>
        <img src={unklabLogo} alt="Logo" />
        <h1>RESEARCH PROJECT TOPIC RECOMMENDATION SYSTEM</h1>
      </header>

      <div className="login-container">
        <Masuk />
      </div>

      <footer>
        <h3>© 2024 - Fakultas Ilmu Komputer - Universitas Klabat</h3>
      </footer>
    </div>
  );
}

export default App;

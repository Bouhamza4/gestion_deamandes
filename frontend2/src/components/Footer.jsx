// Footer.jsx
import React from 'react';
import './Footer.css';

const Footer = () => {
  return (
    <footer className="footer">
      <p>© {new Date().getFullYear()} Commune Rouadi. Tous droits réservés.</p>
    </footer>
  );
};

export default Footer;

import React from 'react';
import { Link } from 'react-router-dom';

function Navbar() {
  return (
    <nav style={navStyle}>
      <Link to="/" style={linkStyle}>Accueil</Link>
      <Link to="/ajouter" style={linkStyle}>Ajouter</Link>
      <Link to="/statistiques" style={linkStyle}>Statistiques</Link>
    </nav>
  );
}

const navStyle = {
  display: 'flex',
  padding: '1rem',
  backgroundColor: '#343a40',
  justifyContent: 'center'
};

const linkStyle = {
  margin: '0 1rem',
  color: 'white',
  textDecoration: 'none',
  fontWeight: 'bold'
};

export default Navbar;

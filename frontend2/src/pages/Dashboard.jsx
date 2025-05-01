// Dashboard.jsx
import React, { useState } from 'react';
import './Dashboard.css';

const Dashboard = () => {
  const [activePage, setActivePage] = useState('home');

  const renderPage = () => {
    switch (activePage) {
      case 'home':
        return <div className="page-content">Bienvenue dans votre tableau de bord 🏠</div>;
      case 'demandes':
        return <div className="page-content">📄 Liste des demandes</div>;
      case 'statistiques':
        return <div className="page-content">📊 Statistiques en temps réel</div>;
      case 'parametres':
        return <div className="page-content">⚙️ Paramètres utilisateur</div>;
      default:
        return <div className="page-content">Page introuvable</div>;
    }
  };

  return (
    <div className="dashboard">
      <aside className="sidebar">
        <h2 className="logo">🛡️ JamaaTorabiya</h2>
        <nav>
          <ul>
            <li onClick={() => setActivePage('home')} className={activePage === 'home' ? 'active' : ''}>Accueil</li>
            <li onClick={() => setActivePage('demandes')} className={activePage === 'demandes' ? 'active' : ''}>Demandes</li>
            <li onClick={() => setActivePage('statistiques')} className={activePage === 'statistiques' ? 'active' : ''}>Statistiques</li>
            <li onClick={() => setActivePage('parametres')} className={activePage === 'parametres' ? 'active' : ''}>Paramètres</li>
          </ul>
        </nav>
      </aside>
      <main className="main-content">
        <div className="card-wrapper">
          <div className="card-3d">
            {renderPage()}
          </div>
        </div>
      </main>
    </div>
  );
};

export default Dashboard;

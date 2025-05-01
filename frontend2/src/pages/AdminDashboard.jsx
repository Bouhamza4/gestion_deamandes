import React, { useState } from 'react';
import './Dashboard1.css';
import {
  FaChartBar,
  FaClipboardList,
  FaUsers,
  FaUserCircle,
  FaCog,
  FaSignOutAlt,
  FaCalendarAlt
} from 'react-icons/fa';

const menuItemsAdmin = [
  { key: 'stats', icon: <FaChartBar />, label: 'Statistiques' },
  { key: 'requests', icon: <FaClipboardList />, label: 'Demandes' },
  { key: 'users', icon: <FaUsers />, label: 'Utilisateurs' }
];

const menuItemsCitoyen = [
  { key: 'myRequests', icon: <FaClipboardList />, label: 'Mes demandes' },
  { key: 'reservations', icon: <FaCalendarAlt />, label: 'Réservations' }
];

const ProfileDropdown = ({ user, onLogout }) => {
  const [open, setOpen] = useState(false);
  return (
    <div className="profile-wrapper">
      <img
        src={user.avatar || 'https://via.placeholder.com/40'}
        alt={user.name}
        className="profile-avatar"
        onClick={() => setOpen(!open)}
      />
      {open && (
        <ul className="profile-dropdown">
          <li>{user.name}</li>
          <li><FaUserCircle /> Profile</li>
          <li><FaCog /> Paramètres</li>
          <li><FaCalendarAlt /> Réservations</li>
          <li onClick={onLogout}><FaSignOutAlt /> Déconnexion</li>
        </ul>
      )}
    </div>
  );
};

export const AdminDashboard = ({ user, onLogout }) => {
  const [active, setActive] = useState('stats');
  const items = menuItemsAdmin;
  const renderContent = () => {
    switch (active) {
      case 'stats': return <div className="dashboard-panel">Graphiques statistiques...</div>;
      case 'requests': return <div className="dashboard-panel">Table des demandes...</div>;
      case 'users': return <div className="dashboard-panel">Gestion des utilisateurs...</div>;
      default: return null;
    }
  };
  return (
    <div className="dashboard-container">
      <aside className="sidebar">
        <h2 className="logo">JamaaTorabiya</h2>
        <nav>
          {items.map(item => (
            <button
              key={item.key}
              className={active === item.key ? 'menu-btn active' : 'menu-btn'}
              onClick={() => setActive(item.key)}
            >
              {item.icon}
              <span>{item.label}</span>
            </button>
          ))}
        </nav>
        <ProfileDropdown user={user} onLogout={onLogout} />
      </aside>
      <main className="content">
        {renderContent()}
      </main>
    </div>
  );
};

// 🛠️ Début de la structure du Dashboard moderne selon طلبك

import React, { useState } from 'react';
import { FaHome, FaUser, FaEnvelope, FaCog } from 'react-icons/fa';
import './Dashboard1.css';

const user = JSON.parse(localStorage.getItem('user'));

const Sidebar = ({ setActivePage }) => {
  return (
    <div className="sidebar">
      <div className="logo">LOGO</div>
      <button onClick={() => setActivePage('home')}><FaHome /> Home</button>
      <button onClick={() => setActivePage('messages')}><FaEnvelope /> Messages</button>
      <button><FaUser /> Profile</button>
      <button><FaCog /> Settings</button>
    </div>
  );
};

const TopNavbar = ({ user }) => {
  return (
    <div className="top-navbar">
      <div className="search-bar">
        <input type="text" placeholder="Search..." />
      </div>
      <div className="user-info">
        <img src={user.avatar} alt="User" className="avatar" />
        <span>{user.name}</span>
      </div>
    </div>
  );
};

const Card = ({ title, progress, color }) => (
  <div className="card" style={{ backgroundColor: color }}>
    <h4>{title}</h4>
    <div className="progress-bar">
      <div style={{ width: `${progress}%` }}></div>
    </div>
    <p>{progress}% Complete</p>
  </div>
);

const MessageCard = ({ sender, message, date }) => (
  <div className="message-card">
    <h5>{sender}</h5>
    <p>{message}</p>
    <span>{date}</span>
  </div>
);

export const CitoyenDashboard = () => {
  const [activePage, setActivePage] = useState('home');

  const user = {
    avatar: 'https://i.pravatar.cc/40',
    name: 'Citoyen User'
  };

  const cardsData = [
    { title: 'Demande Naissance', progress: 60, color: '#ffe0b2' },
    { title: 'Demande Mariage', progress: 50, color: '#d1c4e9' },
    { title: 'Demande Décès', progress: 70, color: '#c8e6c9' },
    { title: 'Demande Résidence', progress: 70, color: '#b3e5fc' }
  ];

  const messagesData = [
    { sender: 'Amine', message: 'Demande de résidence en cours', date: 'Apr 26' },
    { sender: 'Karim', message: 'Demande de naissance acceptée', date: 'Apr 25' },
    { sender: 'Sara', message: 'Nouvelle demande soumise', date: 'Apr 24' }
  ];

  return (
    <div className="dashboard-container">
      <Sidebar setActivePage={setActivePage} />
      <div className="main-content">
        <TopNavbar user={user} />

        {activePage === 'home' && (
          <div className="cards-grid">
            {cardsData.map((card, idx) => (
              <Card key={idx} {...card} />
            ))}
            <div className="messages-section">
              <h3>Client Messages</h3>
              {messagesData.map((msg, idx) => (
                <MessageCard key={idx} {...msg} />
              ))}
            </div>
          </div>
        )}

        {activePage === 'messages' && (
          <div className="only-messages">
            <h3>Client Messages</h3>
            {messagesData.map((msg, idx) => (
              <MessageCard key={idx} {...msg} />
            ))}
          </div>
        )}
      </div>
    </div>
  );
};



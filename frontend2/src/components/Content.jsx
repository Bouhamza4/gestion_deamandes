// Content.jsx
import React from 'react';
import { motion } from 'framer-motion';
import './Content.css';

const Content = () => {
  const cards = [
    { title: 'Demandes Administratives', progress: 65, delay: 0.1 },
    { title: 'Réservations', progress: 80, delay: 0.2 },
    { title: 'Gestion des Citoyens', progress: 45, delay: 0.3 },
    { title: 'Traitement des Plainte', progress: 55, delay: 0.4 },
    { title: 'Demandes Urgentes', progress: 70, delay: 0.5 },
  ];

  return (
    <div className="cards-grid">
      {cards.map((card, index) => (
        <motion.div 
          className="card" 
          key={index}
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: card.delay }}
          whileHover={{ scale: 1.05, rotate: 1 }}
        >
          <h3>{card.title}</h3>
          <div className="progress-bar">
            <div className="progress" style={{ width: `${card.progress}%` }}></div>
          </div>
          <p>{card.progress}% complété</p>
        </motion.div>
      ))}
    </div>
  );
};

export default Content;

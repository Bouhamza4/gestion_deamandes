// src/components/ReservationDetailsModal.jsx
import React from 'react';
import { motion } from 'framer-motion';
import './ReservationDetailsModal.css';

const ReservationDetailsModal = ({ reservation, onClose }) => {
  if (!reservation) return null;

  return (
    <div className="modal-overlay" onClick={onClose}>
      <motion.div
        className="modal-content"
        onClick={(e) => e.stopPropagation()}
        initial={{ scale: 0.7, opacity: 0 }}
        animate={{ scale: 1, opacity: 1 }}
        exit={{ scale: 0.7, opacity: 0 }}
        transition={{ duration: 0.3 }}
      >
        <h2>Détails de la Réservation</h2>
        <div className="modal-info">
          <p><strong>Nom:</strong> {reservation.user.name}</p>
          <p><strong>Type de demande:</strong> {reservation.type}</p>
          <p><strong>Statut:</strong> 
            <span className={`status ${reservation.status}`}>
              {reservation.status}
            </span>
          </p>
          <p><strong>Date:</strong> {new Date(reservation.created_at).toLocaleDateString()}</p>
          <p><strong>Description:</strong> {reservation.description}</p>
        </div>
        <button className="close-btn" onClick={onClose}>Fermer</button>
      </motion.div>
    </div>
  );
};

export default ReservationDetailsModal;

import React, { useEffect, useState } from 'react';
import { motion } from 'framer-motion';
import axios from 'axios';
import { toast } from 'react-toastify';
import '../assets/styles/MesReservations.css';
import ReservationDetailsModal from '../components/ReservationDetailsModal';
import { AnimatePresence } from 'framer-motion';
const MesReservations = () => {
  const [reservations, setReservations] = useState([]);
  // const [statusFilter, setStatusFilter] = useState('all');
  const [loading, setLoading] = useState(true);
  const [filter, setFilter] = useState('all');
  const [selectedReservation, setSelectedReservation] = useState(null);
  

  const fetchReservations = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/reservations');
      setReservations(response.data);
    } catch (error) {
      console.error(error);
      toast.error('خطأ أثناء تحميل الحجوزات');
    } finally {
      setLoading(false);
    }
  };
    useEffect(() => {
      fetchReservations();
    }, []);

    const filteredReservations = filter === 'all' 
    ? reservations 
    : reservations.filter((res) => res.status === filter);
  return (
    <motion.div
      className="reservations-container"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      transition={{ duration: 0.5 }}
    >
      <div className="reservations-header">
        <h2>Mes Réservations 📑</h2>
        <a href="/reservation"  className="c-button create-btn">
  <span class="c-main">
    <span class="c-ico"><span class="c-blur"></span> <span class="ico-text">+</span></span>
    Ajouter un reservation
  </span>
</a>
      </div>

      <div className="filter-buttons">
        <button onClick={() => setFilter('all')}>Tout</button>
        <button onClick={() => setFilter('en_attente')}>En Attente</button>
        <button onClick={() => setFilter('accepte')}>Accepté</button>
        <button onClick={() => setFilter('reporté')}>Refusé</button>
      </div>

      <div className="reservations-list">
        {loading? (
          <div className="loading">⏳ Chargement...</div>
        ):

          filteredReservations.length === 0 ? (
            <div className="no-reservations">🚫 لا توجد حجوزات حالياً</div>
          ):(
            <motion.div 
                      className="reservations-grid"
                      initial={{ opacity: 0 }}
                      animate={{ opacity: 1 }}
                      transition={{ duration: 0.5 }}
                    >
                   {
                     filteredReservations.map(res => (
                      <motion.div
                        key={res.id}
                        className={`reservation-card ${res.status.replace(' ', '-')}`}
                        whileHover={{ scale: 1.03 }}
                      >
                        <h3>{res.type}</h3>
                        <p className='crd-info'><strong>Type:</strong> {res.type}</p>
                        <p className='crd-info'><strong>Statut:</strong><span className={`status ${res.status}`}>{res.status}</span></p>
                        <p className='crd-info'><strong>Date:</strong> {new Date(res.created_at).toLocaleDateString()}</p>
                        <button className="create-btn" onClick={() => setSelectedReservation(res)}>
                          Voir détails
                        </button>
                      </motion.div>
                    ))
                   }
                    </motion.div>
          )
         }
       
      </div>
      <AnimatePresence>
        {selectedReservation && (
          <ReservationDetailsModal
            reservation={selectedReservation}
            onClose={() => setSelectedReservation(null)}
          />
        )}
      </AnimatePresence>
    </motion.div>
  );
};

export default MesReservations;

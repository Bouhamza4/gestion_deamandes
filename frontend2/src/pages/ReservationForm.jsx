// src/pages/ReservationForm.jsx
import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import '../assets/styles/ReservationForm.css';
import axios from 'axios';

const ReservationForm = () => {
  const [formData, setFormData] = useState({
    type: '',
    // description: '',
    date: '',
    time: '',
    notes: '',
    document: null
  });
  const [loading, setLoading] = useState(false);

  const handleChange = (e) => {
    const { name, value, files } = e.target;
    if (name === 'document') {
      setFormData({ ...formData, document: files[0] });
    } else {
      setFormData({ ...formData, [name]: value });
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);

    const data = new FormData();
    data.append('type', formData.type);
    // data.append('description', formData.description);
    data.append('reservation_date', formData.date);
    data.append('reservation_time', formData.time);
    data.append('notes', formData.notes);
    if (formData.document) data.append('document', formData.document);

    try {
      await axios.get('http://localhost:8000/sanctum/csrf-cookie');
      await axios.post('http://localhost:8000/api/reservations', data, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
        withCredentials: true,
      });
      toast.success('✅ Réservation envoyée avec succès !');
      setFormData({ type: '', description: '', date: '', time: '', notes: '', document: null });
    } catch (error) {
      console.error(error);
      toast.error('❌ Erreur lors de l’envoi de la réservation');
    } finally {
      setLoading(false);
    }
  };

  return (
    <motion.div
      className="reservation-container"
      initial={{ opacity: 0, y: 50 }}
      animate={{ opacity: 1, y: 0 }}
      exit={{ opacity: 0 }}
      transition={{ duration: 0.6 }}
    >
      <form className="reservation-form" onSubmit={handleSubmit} encType="multipart/form-data">
        <div className="form-group">
          <label>Type de Demande</label>
          <select name="type" value={formData.type} onChange={handleChange} required>
            <option value="">-- Choisir --</option>
            <option value="Eau">Demande Eau</option>
            <option value="Électricité">Demande Électricité</option>
            <option value="Acte de naissance">Acte de Naissance</option>
            <option value="Autorisation Terrains">Autorisation de Terrain</option>
          </select>
        </div>

        

        <div className="form-group">
          <label>Date de Rendez-vous</label>
          <input
            type="date"
            name="date"
            value={formData.date}
            onChange={handleChange}
            required
          />
        </div>

        <div className="form-group">
          <label>Heure de Rendez-vous</label>
          <input
            type="time"
            name="time"
            value={formData.time}
            onChange={handleChange}
            required
          />
        </div>

        <div className="form-group">
          <label>Notes</label>
          <textarea
            name="notes"
            value={formData.notes}
            onChange={handleChange}
            placeholder="Ajoutez des notes supplémentaires (facultatif)..."
          />
        </div>

        <div className="form-group">
          <div className="container">
            <div className="header">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
              <p>Browse File to upload!</p>
            </div>
            <label htmlFor="file" className="footer">
              <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
              </svg>
              <p>{formData.document ? formData.document.name : "Not selected file"}</p>
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="#000000" stroke-width="2"></path>
                <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="#000000" stroke-width="2"></path>
              </svg>
            </label>
            <input
              id="file"
              type="file"
              name="document"
              accept=".pdf,.jpg,.jpeg,.png"
              onChange={handleChange}
            />
          </div>
        </div>

        <button type="submit" className="submit-btn" disabled={loading}>
          {loading ? 'Envoi en cours...' : 'Envoyer la demande'}
        </button>
      </form>
    </motion.div>
  );
};

export default ReservationForm;

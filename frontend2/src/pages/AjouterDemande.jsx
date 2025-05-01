import React, { useState } from 'react';
import api from '../services/api';

function AjouterDemande() {
  const [type, setType] = useState('');
  const [description, setDescription] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    await api.post('/demandes', { type, description });
    alert('Demande envoyée !');
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>Type:</label>
      <input type="text" value={type} onChange={(e) => setType(e.target.value)} />
      <label>Description:</label>
      <textarea value={description} onChange={(e) => setDescription(e.target.value)} />
      <button type="submit">Envoyer</button>
    </form>
  );
}

export default AjouterDemande;

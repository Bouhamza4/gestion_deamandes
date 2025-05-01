import React, { useState } from 'react';
import { motion } from 'framer-motion';
import '../assets/styles/Sittings.css';

const SettingsPage = () => {
  const [formData, setFormData] = useState({
    name: 'Bouhamza',
    email: 'bouhamza@example.com',
    password: ''
  });
  const [showPassword, setShowPassword] = useState(false);

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const togglePassword = () => setShowPassword(!showPassword);

  const handleSubmit = (e) => {
    e.preventDefault();
    // handle update logic
    alert('Settings saved!');
  };

  return (
    <motion.div
      className="settings-container"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      transition={{ duration: 0.5 }}
    >
      <h2>Paramètres du Compte</h2>
      <form className="settings-form" onSubmit={handleSubmit}>
        <div className="form-group">
          <label>Nom</label>
          <input
            type="text"
            name="name"
            value={formData.name}
            onChange={handleChange}
            required
          />
        </div>
        <div className="form-group">
          <label>Email</label>
          <input
            type="email"
            name="email"
            value={formData.email}
            onChange={handleChange}
            required
          />
        </div>
        <div className="form-group password-group">
          <label>Mot de passe</label>
          <div className="password-wrapper">
            <input
              type={showPassword ? 'text' : 'password'}
              name="password"
              value={formData.password}
              onChange={handleChange}
              required
            />
            <span className="toggle-password" onClick={togglePassword}>
              {showPassword ? '🙈' : '👁️'}
            </span>
          </div>
        </div>
        <button type="submit" className="save-btn">Enregistrer</button>
      </form>
    </motion.div>
  );
};

export default SettingsPage;

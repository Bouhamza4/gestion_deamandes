// Sidebar.jsx
import React from 'react';
import { FaHome, FaEnvelope, FaCog } from 'react-icons/fa';
import { motion } from 'framer-motion';
import './Sidebar.css';
import { NavLink } from 'react-router-dom';

const Sidebar = () => {
  return (
    <motion.div 
      className="sidebar"
      initial={{ x: -250 }}
      animate={{ x: 0 }}
      transition={{ type: 'spring', stiffness: 70 }}
    >
      <div className="logo">Commune</div>
      <ul className="sidebar-menu">
        <motion.li whileHover={{ scale: 1.1 }}>
        <li><NavLink to="/dashboard" activeclassname="active"><FaHome /><span>Dashboard</span></NavLink></li>
        </motion.li>

        <motion.li whileHover={{ scale: 1.1 }}>
        <li><NavLink to="/messages" activeclassname="active"><FaEnvelope /><span>Messages</span></NavLink></li>
        </motion.li>

        <motion.li whileHover={{ scale: 1.1 }}>
          <li><NavLink to="/settings" activeclassname="active"><FaCog /><span>Paramètres</span></NavLink></li>
        </motion.li>
      </ul>
    </motion.div>
  );
};

export default Sidebar;

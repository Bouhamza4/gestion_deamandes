// DashboardPage.jsx
import React from 'react';
import Sidebar from '../components/Sidebar';
import Navbar from '../components/Navbar';
import Content from '../components/Content';
import { motion } from 'framer-motion';
import './Dashboard.css';
import Footer from '../components/Footer';

const DashboardPage = () => {
//   toast.success('Connexion réussie !');
// toast.error('Erreur de connexion !');
  return (
    <div className="dashboard-container">
      
      <div className="main-content">
        <Navbar />
        <motion.div 
          initial={{ opacity: 0 }} 
          animate={{ opacity: 1 }} 
          transition={{ duration: 0.8 }}
        >
          <Content />
        </motion.div>
        <Footer />
      </div>
      
    </div>
  );
};

export default DashboardPage;

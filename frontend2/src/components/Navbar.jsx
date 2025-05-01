// Navbar.jsx
import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import './Navbar.css';

const Navbar = () => {
  const [dropdownOpen, setDropdownOpen] = useState(false);

  const user = { 
    name: 'Bouhamza', 
    avatar: 'https://i.pravatar.cc/40' 
  };

  const toggleDropdown = () => {
    setDropdownOpen(!dropdownOpen);
  };

  return (
    <motion.div 
      className="navbar"
      initial={{ y: -70 }}
      animate={{ y: 0 }}
      transition={{ type: 'spring', stiffness: 80 }}
    >
      <div className="search-bar">
        <input type="text" placeholder="Search..." />
      </div>

      <div className="user-info">
        <img src={user.avatar} alt="avatar" onClick={toggleDropdown} />
        

        <AnimatePresence>
          {dropdownOpen && (
            <motion.ul 
              className="dropdown-menu"
              initial={{ opacity: 0, y: -10 }}
              animate={{ opacity: 1, y: 0 }}
              exit={{ opacity: 0, y: -10 }}
              transition={{ duration: 0.2 }}
            >
              <li>{user.name}</li>
              <li>My Account</li>
              <li>Profile</li>
              <li>Settings</li>
              <li>Logout</li>
            </motion.ul>
          )}
        </AnimatePresence>
      </div>
    </motion.div>
  );
};

export default Navbar;

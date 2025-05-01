import React from 'react';
import { motion } from 'framer-motion';
import '../assets/styles/Messages.css';

const dummyMessages = [
  { sender: 'Amine', subject: 'Demande de résidence', snippet: 'Votre demande est en cours de traitement...', date: 'Apr 26' },
  { sender: 'Karim', subject: 'Certificat de naissance', snippet: 'Votre certificat est prêt à être récupéré.', date: 'Apr 25' },
  { sender: 'Sara', subject: 'Nouvelle requête', snippet: 'Vous avez reçu une nouvelle demande.', date: 'Apr 24' },
  { sender: 'Leila', subject: 'Confirmation', snippet: 'Votre paiement a été confirmé.', date: 'Apr 23' },
];

const MessagesPage = () => {
  return (
    <motion.div
      className="messages-container"
      initial={{ x: 300, opacity: 0 }}
      animate={{ x: 0, opacity: 1 }}
      exit={{ x: -300, opacity: 0 }}
      transition={{ type: 'spring', stiffness: 80 }}
    >
      <h2>Messages</h2>
      <ul className="messages-list">
        {dummyMessages.map((msg, idx) => (
          <motion.li
            key={idx}
            className="message-item"
            whileHover={{ backgroundColor: '#334155' }}
            transition={{ duration: 0.2 }}
          >
            <div className="message-sender">{msg.sender}</div>
            <div className="message-content">
              <strong>{msg.subject}</strong> &ndash; {msg.snippet}
            </div>
            <div className="message-date">{msg.date}</div>
          </motion.li>
        ))}
      </ul>
    </motion.div>
  );
};

export default MessagesPage;
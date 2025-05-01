import React, { useState, useEffect } from 'react';
import './Home.css';
import { BarChart3, FileText, Users } from 'lucide-react';

const Home = () => {
  const [showMenu, setShowMenu] = useState(false);

  useEffect(() => {
    const revealElements = document.querySelectorAll('.reveal');
    const revealOnScroll = () => {
      for (let el of revealElements) {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;
        const elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
          el.classList.add('active');
        } else {
          el.classList.remove('active');
        }
      }
    };
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();
    return () => window.removeEventListener('scroll', revealOnScroll);
  }, []);

  return (
    <div className="home-container">
      <header className="navbar">
        <div className="container">
          <div className="logo">🛡️ JamaaTorabiya</div>
          <nav className={`nav-links ${showMenu ? 'active' : ''}`}>
            <a href="/">Accueil</a>
            <a href="/services">Services</a>
            <a href="/contact">Contact</a>
          </nav>
          <div className="menu-toggle" onClick={() => setShowMenu(!showMenu)}>
            ☰
          </div>
        </div>
      </header>

      <section className="hero reveal">
        <h1>Plateforme de gestion des demandes administratives</h1>
        <p>Simplifiez la communication avec votre commune grâce à une plateforme moderne et efficace.</p>
        <div className="animated-icon">
          <svg xmlns="http://www.w3.org/2000/svg" className="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 2l7 7-7 7-7-7 7-7z" />
          </svg>
        </div>
      </section>

      <section className="services">
        <h2>Nos Services</h2>
        <div className="services">
          <div className="service-card">
            <FileText size={40} />
            <h3>Demande d’attestation</h3>
            <p>Effectuez des demandes d’attestations en ligne facilement.</p>
          </div>
          <div className="service-card">
            <Users size={40} />
            <h3>Suivi de vos dossiers</h3>
            <p>Consultez le statut de vos demandes à tout moment.</p>
          </div>
          <div className="service-card">
            <BarChart3 size={40} />
            <h3>Statistiques</h3>
            <p>Visualisez l’évolution des demandes dans votre commune.</p>
          </div>
        </div>
      </section>

      <section className="testimonials reveal">
        <h2>Témoignages</h2>
        <div className="testimonial">
          <p>“Excellente plateforme, très simple à utiliser.”</p>
          <span>— Mme Laila, citoyenne</span>
        </div>
        <div className="testimonial">
          <p>“Un grand pas vers la modernisation de nos services.”</p>
          <span>— M. Ahmed, responsable communal</span>
        </div>
      </section>

      <section className="team reveal">
        <h2>Notre Équipe</h2>
        <div className="team-members">
          <div className="member">
            <img src="/images/member1.jpg" alt="Ali" />
            <h3>Ali</h3>
            <p>Développeur</p>
          </div>
          <div className="member">
            <img src="/images/member2.jpg" alt="Sara" />
            <h3>Sara</h3>
            <p>Designer</p>
          </div>
        </div>
      </section>

      <footer className="footer">
        <div className="footer-container">
          <p>© 2025 Jamaa Torabiya. Tous droits réservés.</p>
          <div>
            <a href="#">Mentions légales</a>
            <a href="#">Politique de confidentialité</a>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default Home;


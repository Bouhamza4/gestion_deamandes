// src/App.jsx
import React from 'react';
import { BrowserRouter, Routes, Route, useLocation } from 'react-router-dom';
import { AnimatePresence } from 'framer-motion';
import DashboardPage from './pages/DashboardPage';
import LoginPage from './pages/LoginPage';
import RegisterPage from './pages/RegisterPage';
import Home from './pages/Home';
import MessagesPage from './pages/MessagesPage';
import ReservationForm from './pages/ReservationForm';
import MesReservations from './pages/MesReservations';
import SettingsPage from './pages/SettingsPage';
import Sidebar from './components/Sidebar';
import "./App.css";
function AnimatedRoutes() {
  const location = useLocation();

  return (
    <AnimatePresence mode="wait">
      <Routes location={location} key={location.pathname}>
        <Route path="/dashboard" element={<DashboardPage />} />
        <Route path="/messages" element={<MessagesPage />} />
        <Route path="/reservation" element={<ReservationForm />} />
        <Route path="/mes-reservations" element={<MesReservations />} />
        <Route path="/settings" element={<SettingsPage />} />
      </Routes>
    </AnimatePresence>
  );
}

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/login" element={<LoginPage />} />
        <Route path="/register" element={<RegisterPage />} />
        <Route
          path="/*"
          element={
            <>
              
  <div className="app-layout">
    <Sidebar />
    <div className="main-content">
      <AnimatedRoutes />
    </div>
  </div>

            </>
          }
        />
      </Routes>
    </BrowserRouter>
  );
}

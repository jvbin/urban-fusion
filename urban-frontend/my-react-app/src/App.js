
import React, { useState, useEffect, useRef } from 'react';
import { BrowserRouter as Router, Route, Link, Routes } from 'react-router-dom';
import './App.css';
import Home from './components/home';
import StoreComponent from './components/data';
import FullListPage from './components/fullPage';

function App() {
  const [showPopup, setShowPopup] = useState(false);
  const menuContainerRef = useRef(null);

  const togglePopup = () => {
    setShowPopup((prev) => !prev);
  };

  const closePopup = () => {
    setShowPopup(false);
  };

  useEffect(() => {
    const handleOutsideClick = (event) => {
      if (menuContainerRef.current && !menuContainerRef.current.contains(event.target)) {
        closePopup();
      }
    };

    document.addEventListener('click', handleOutsideClick);

    return () => {
      document.removeEventListener('click', handleOutsideClick);
    };
  }, []);

  const handleStoreFinderClick = (event) => {
    event.stopPropagation();
    togglePopup();
  };

  return (
    <div className="full-div">
      <Router>
        <header>
          <div className="logo">
            <div className="inner-logo">

              <div className='main-logo'>
                <img src={require("./components/logo.png")} alt="Test" className='search-image' />
              </div>
              <div className='search'>
                <img src={require("./components/Search.png")} alt="Test" className='banner-image' />
                <img src={require("./components/Fav icon.png")} alt="Test" className='banner-image' />
                <img src={require("./components/Profile.png")} alt="Test" className='banner-image' />
                <img src={require("./components/Bag.png")} alt="Test" className='banner-image' />

              </div>

            </div>
          </div>


          <div className="header">
            <ul className="store-finder">
              <li>Categories</li>
              <li>Deals</li>
              <li>What's New</li>
              <li>Pickup & Delivery</li>
              <li className="store-link" onClick={handleStoreFinderClick}>Store Finder</li>

            </ul>
          </div>
        </header>
        <div className={`side-popup ${showPopup ? 'open' : ''}`} ref={menuContainerRef}>
          <StoreComponent closeMenu={closePopup} />
        </div>

        <Routes>
          <Route path="/" element={<Home />} />

          <Route path="/full-list" element={<FullListPage />} />


        </Routes>
      </Router>
    </div>
  );
}

export default App;

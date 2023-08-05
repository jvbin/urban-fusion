import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const StoreComponent = ({ closeMenu }) => {
  const [stores, setStores] = useState([]);
  const [zipcode, setZipcode] = useState('');
  const [suggestions, setSuggestions] = useState([]);
  const [foundResult, setFoundResult] = useState(true);

  const fetchData = async (input) => {
    try {
      const response = await fetch('/data.json');
      const data = await response.json();

      const filteredStores = data.stores.filter((store) => {
        const zipMatch = store.zip_code.startsWith(input);
        const stateMatch = store.state.toLowerCase().startsWith(input.toLowerCase());
        const cityMatch = store.city.toLowerCase().startsWith(input.toLowerCase());
        return zipMatch || stateMatch || cityMatch;
      });

      setSuggestions(filteredStores);
      setFoundResult(filteredStores.length > 0);
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };

  const handleZipcodeChange = (event) => {
    const input = event.target.value;
    setZipcode(input);
    setSuggestions([]);
    setStores([]);
    setFoundResult(true);
    if (input) {
      fetchData(input);
    }
  };

  const handleSuggestionClick = (suggestion) => {
    setZipcode('');
    setSuggestions([]);
    setStores([suggestion]);
    setFoundResult(true);
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (suggestions.length > 0) {
      handleSuggestionClick(suggestions[0]);
    }
  };

  return (
    <div>
      <h1>Stores</h1>
      <form onSubmit={handleSubmit}>
        <label>Enter Zipcode:</label>
        <input
          type="text"
          id="zipcode"
          name="zipcode"
          value={zipcode}
          onChange={handleZipcodeChange}
        />
        <div className='fulllist'>
       
          <Link to="/full-list" className='full-list'>
            See the full list
          </Link>
        </div>
      </form>
      {suggestions.length > 0 ? (
        <ul>
          {suggestions.map((store) => (
            <li key={store.name} onClick={() => handleSuggestionClick(store)}>
              {store.name} - {store.zip_code}
            </li>
          ))}
        </ul>
      ) : null}
      {stores.length > 0 && (
        <ul>
          {stores.map((store) => (
            <li key={store.name} className='data'>
              <h3>{store.name}</h3>
              <p>Zip Code: {store.zip_code}</p>
              <p>Ratings: {store.ratings}</p>
              <p>State: {store.state}</p>
              <p>City: {store.city}</p>
              <p>Address: {store.address}</p>
              <p>Contact Number: {store.contact_number}</p>
            </li>
          ))}
        </ul>
      )}
      {!foundResult && zipcode !== '' && <p>Result not found</p>}
    </div>
  );
};

export default StoreComponent;
import React, { useState, useEffect } from 'react';

export const BilletTable = () => {
  const [billets, setBillets] = useState([]);

  useEffect(() => {
    fetch('http://localhost/yonnha_site_reservation/api/baskets')
      .then(response => response.json())
      .then(data => setBillets(data))
      .catch(error => console.error(error));
  }, []);
  
  return (
    <table>
      <thead>
        <tr>
          <th>Date de réservation</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
        {billets.map(billet => (
          <tr key={billet.id}>
            <td>{billet.date_purchase}</td>
            <td>{billet.prix_total}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}  
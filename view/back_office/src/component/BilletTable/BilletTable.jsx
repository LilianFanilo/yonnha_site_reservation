import React, { useState, useEffect } from 'react';
import Chart from '../Chart/Chart';

export const BilletTable = () => {
  const [billets, setBillets] = useState([]);

  useEffect(() => {
    fetch('http://localhost/yonnha_site_reservation/api/baskets')
      .then(response => response.json())
      .then(data => setBillets(data))
      .catch(error => console.error(error));
  }, []);
  
  // Calculer la somme totale du prix
  const total = billets.reduce((acc, billet) => acc + parseFloat(billet.prix_total), 0);

  return (
    
    <div>
        <Chart/>
      <div>
        Recettes : {total} €
      </div>
      <table>
        <thead>
          <tr>
            <th>Date de réservation</th>
            <th>Nombre de billets</th>
            <th>Prix</th>
          </tr>
        </thead>
        <tbody>
          {billets.map(billet => (
            <tr key={billet.id}>
              <td>{billet.date_purchase}</td>
              <td>{billet.nb_billets} pers</td>
              <td>{billet.prix_total}</td>
            </tr>
          ))}
        </tbody>
      </table>

    </div>
  );
}

import React, { useState, useEffect } from 'react';

const Chart = () => {
  const [stats, setStats] = useState([]);

  useEffect(() => {
    fetch('http://localhost/yonnha_site_reservation/api/baskets')
      .then(response => response.json())
      .then(data => setStats(data))
      .catch(error => console.error(error));
  }, []);

  return (
    <div>
      <p className='number_stat'>
      Nombre de réservations : {stats.length}
      </p>
    </div>
  );
};


export default Chart;

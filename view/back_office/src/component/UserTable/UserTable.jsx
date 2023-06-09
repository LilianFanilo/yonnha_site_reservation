import React, { useState, useEffect } from 'react';
import "./UserTable.css";

export const UserTable = () => {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    fetch('http://localhost/yonnha_site_reservation/api/users')
      .then(response => response.json())
      .then(data => setUsers(data))
      .catch(error => console.error(error));
  }, []);

  const handleDelete = (id) => {
    const confirmed = window.confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
  
    if (confirmed) {
      fetch(`http://localhost/yonnha_site_reservation/api/users/${id}`, {
        method: 'DELETE',
        headers: {"Access-Control-Allow-Origin" : "*",
          "Access-Control-Allow-Methods": "*",
          "Access-Control-Allow-Headers": "*"}
      })
        .then(response => {
          if (response.ok) {
            setUsers(users.filter(user => user.id !== id));
          } else {
            console.error(`Une erreur est survenue : ${response.status}`);
          }
        })
        .catch(error => console.error(error));
    }
  }
  
  return (
    <table>
      <thead>
        <tr>
          <th>Login</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Date de création</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        {users.slice(1).map(user => (
          <tr key={user.id} className="user-line">
            <td>{user.login}</td>
            <td>{user.name}</td>
            <td>{user.surname}</td>
            <td>{user.mail}</td>
            <td>{user.date_creation}</td>
            <td>
              <button onClick={() => handleDelete(user.id)}>Supprimer</button>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}  
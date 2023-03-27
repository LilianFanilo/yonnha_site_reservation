import React, { useEffect } from "react";

function UserTable() {

  useEffect(() => {
    fetch("/api/users")
    .then(response => response.json())
    .then(data => {
        data.forEach(user => {
            return (
              <div>
              <h1>Liste des utilisateurs</h1>
              <ul>
                {user.map((user) => (
                  <li key={user.id}>
                    {user.name} ({user.email})
                  </li>
                ))}
              </ul>
            </div>
            )
        });
    })
    .catch(error => console.error(error));
  }, []);


}

export default UserTable;

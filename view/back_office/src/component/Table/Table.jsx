import { Button } from "../Button/Button";

export const Table = () => {
    const userList = () => {
        fetch("http://localhost/yonnha_site_reservation/api/users")
        .then(response => response.json())
        .then(data => {
            {data.map((user,index) => {
                <tr>
                    <td> {user.login} </td>
                    <td> {user.mail} </td>
                    <td> {user.creation_date} </td>
                    <td>
                        <Button>
                            Voir plus
                        </Button>
                    </td>
                </tr>
                })}
        })
        .catch(error => console.error(error));
    }
    return (
        <table>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Mail</th>
                    <th>Date de création</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {userList()}
            </tbody>
        </table>
    )
}
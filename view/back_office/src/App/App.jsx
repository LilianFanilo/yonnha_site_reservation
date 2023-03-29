import './App.css';
import { UserTable } from '../component/UserTable/UserTable';
import Chart from '../component/Chart/Chart';

export const App = () => {
  return (
    <div className="App">
        <a href="http://localhost/yonnha_site_reservation">Retour sur le site</a>
        <Chart/>
        <UserTable/>
    </div>
  );
}
export default App;

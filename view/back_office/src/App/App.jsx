import './App.css';
import { UserTable } from '../component/UserTable/UserTable';
import Chart from '../component/Chart/Chart';
import { BilletTable } from '../component/BilletTable/BilletTable';

export const App = () => {
  return (
    <div className="App">
        <a href="http://localhost/yonnha_site_reservation">Retour sur le site</a>
        <Chart/>
        <div>
        <UserTable/>
        <BilletTable/>
        </div>
    </div>
  );
}
export default App;

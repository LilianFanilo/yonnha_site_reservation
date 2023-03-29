import './App.css';
import { UserTable } from '../component/UserTable/UserTable';
import { BilletTable } from '../component/BilletTable/BilletTable';

export const App = () => {
  return (
    <div className="App">
        <div className='header'>
        <h1>Gestion Back Office</h1>
        <a href="http://localhost/yonnha_site_reservation">Retour sur le site</a>
        </div>
        <div className='table_container'>
        <UserTable/>
        <BilletTable/>
        </div>
    </div>
  );
}
export default App;

import "./App.css";
import { AppRouter } from "./assets/AppRouter/AppRouter";
import { Footer } from "./assets/components/Footer";
import { Navbar } from "./assets/components/Navbar";

function App() {
  return (
    <>
      <Navbar></Navbar>
      <AppRouter />
      <Footer></Footer>
    </>
  );
}

export default App;

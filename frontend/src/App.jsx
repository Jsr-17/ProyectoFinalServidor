import { useEffect } from "react";
import { CholloService } from "../api/services/CholloService";
import "./App.css";
import { UsuarioService } from "../api/services/UsuarioService";
import { ComentarioService } from "../api/services/ComentarioService";

function App() {
  const {
    obtenerChollos,
    obtenerChollo,
    crearChollo,
    eliminarChollo,
    actualizarChollo,
  } = CholloService();
  const { eliminarUsuario } = UsuarioService();
  const {
    obtenerComentariosUsuario,
    obtenerComentariosChollo,
    obtenerTodosComentarios,
  } = ComentarioService();

  useEffect(() => {
    const fetchUsuarios = async () => {
      try {
        const response = await obtenerTodosComentarios(1);
        console.log(response.data);
      } catch (error) {
        console.error("Error consiguiendo usuarios:", error);
      }
    };
    fetchUsuarios();
  }, []);

  return <></>;
}

export default App;

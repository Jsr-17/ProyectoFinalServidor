import { Link } from "react-router-dom";
import { useNavBar } from "../../hooks/useNavBar";

export const Navbar = () => {
  const { cerrarSesion, usuario } = useNavBar();
  return (
    <div>
      <nav className="navbar navbar-expand-lg navbar-light bg-light shadow border border-2 m-3 rounded py-3">
        <a className="navbar-brand fw-bold mx-3" href="#">
          ChollosVentas
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div
          className="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul className="navbar-nav">
            {usuario ? (
              <>
                <li className="nav-item">
                  <Link className="nav-link  fw-semibold" to={"/inicio"}>
                    Inicio
                  </Link>
                </li>

                <li className="nav-item">
                  <Link
                    to={"/misChollos"}
                    className="nav-link fw-semibold"
                    href="#"
                  >
                    Mis chollos
                  </Link>
                </li>
                <li className="nav-item">
                  <Link className="nav-link fw-semibold" to={"/crearChollo"}>
                    Crear Chollo
                  </Link>
                </li>
                <li className="nav-item">
                  <Link
                    className="btn btn-secondary mx-4"
                    to={"/login"}
                    onClick={cerrarSesion}
                  >
                    Cerrar Sesión
                  </Link>
                </li>
              </>
            ) : (
              <li className="nav-item">
                <Link className="btn btn-secondary mx-4" to={"/login"}>
                  Iniciar Sesión
                </Link>
              </li>
            )}
          </ul>
        </div>
      </nav>
    </div>
  );
};

import { Link } from "react-router-dom";
import { useLogin } from "../../hooks/useLogin";

export const LoginComponent = () => {
  const {
    email,
    errorMessage,
    handleSubmit,
    loading,
    pass,
    setEmail,
    setPass,
  } = useLogin();

  return (
    <div
      className="container d-flex justify-content-center align-items-center "
      style={{ height: "70vh" }}
    >
      <div
        className="card shadow-lg p-4"
        style={{ width: "100%", maxWidth: "600px", height: "minContent" }}
      >
        <h3 className="card-title text-center mb-4">Iniciar sesión</h3>
        <form onSubmit={handleSubmit}>
          <div className="form-group mb-3">
            <label className="my-3" htmlFor="username">
              Nombre de usuario
            </label>
            <input
              type="text"
              className="form-control"
              value={email}
              placeholder="Ingresa tu nombre de usuario"
              onChange={(e) => setEmail(e.target.value)}
              required
            />
          </div>
          <div className="form-group mb-3">
            <label className="my-3" htmlFor="password">
              Contraseña
            </label>
            <input
              type="password"
              className="form-control"
              value={pass}
              onChange={(e) => setPass(e.target.value)}
              placeholder="Ingresa tu contraseña"
              required
            />
          </div>
          <button
            type="submit"
            className="btn btn-secondary btn-block w-100 my-3"
          >
            Iniciar sesión
          </button>
        </form>
        {loading && (
          <div className="d-flex justify-content-center my-2">
            <div className="spinner-border" role="status">
              <span className="visually-hidden">Cargando...</span>
            </div>
          </div>
        )}
        {errorMessage && <p>{errorMessage}</p>}

        <div className="text-center my-1">
          <Link to={"/register"} className="text-muted">
            Registrate
          </Link>
        </div>
      </div>
    </div>
  );
};

import { useRegister } from "../../hooks/useRegister";

export const RegisterComponent = () => {
  const { handleOnChange, fail, handleSubmit, loading } = useRegister();

  return (
    <div
      className="container d-flex justify-content-center align-items-center"
      style={{ height: "70vh" }}
    >
      <div
        className="card shadow-lg p-4"
        style={{ width: "100%", maxWidth: "600px", height: "90%" }}
      >
        <h3 className="card-title text-center mb-4">Registrarse</h3>
        <form onSubmit={handleSubmit}>
          <div className="form-group mb-3">
            <label className="my-2" htmlFor="email">
              Correo electrónico
            </label>
            <input
              type="email"
              className="form-control"
              name="email"
              placeholder="Ingresa tu correo"
              onChange={handleOnChange}
              required
            />
          </div>
          <div className="form-group mb-3">
            <label className="my-2" htmlFor="username">
              Nombre de usuario
            </label>
            <input
              type="text"
              className="form-control"
              name="nombre"
              placeholder="Introduzca su nombre"
              onChange={handleOnChange}
              required
            />
          </div>
          <div className="form-group mb-3">
            <label className="my-2" htmlFor="password">
              Contraseña
            </label>
            <input
              type="password"
              className="form-control"
              name="pass"
              placeholder="Crea una contraseña"
              onChange={handleOnChange}
              required
            />
          </div>
          <button
            type="submit"
            className="btn btn-secondary btn-block w-100 my-3"
          >
            Registrarse
          </button>
        </form>
        {loading && (
          <div className="d-flex justify-content-center my-2">
            <div className="spinner-border" role="status">
              <span className="visually-hidden">Cargando...</span>
            </div>
          </div>
        )}
        {fail && <p>{fail}</p>}
        <div className="text-center my-1">
          <a href="/login" className="text-muted">
            ¿Ya tienes una cuenta? Inicia sesión
          </a>
        </div>
      </div>
    </div>
  );
};

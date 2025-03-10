import { useCrearChollo } from "../../hooks/useCrearChollo";

export const CrearCholloComponent = () => {
  const { handleChange, handleSubmit, info, loading } = useCrearChollo();
  return (
    <div className="container mt-4">
      {!loading ? (
        <>
          <h2 className="text-center my-5">Crear Nuevo Chollo</h2>
          <form onSubmit={handleSubmit} className="card p-4 shadow-lg">
            <div className=" row row-cols-sm-1 row-cols-md-2 ">
              <div className="mb-3 col">
                <label className="form-label">Título</label>
                <input
                  type="text"
                  name="titulo"
                  className="form-control"
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="mb-3 col">
                <label className="form-label">Puntuación</label>
                <input
                  type="number"
                  name="puntuacion"
                  className="form-control"
                  min="1"
                  max="5"
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="mb-3 col">
                <label className="form-label">Precio</label>
                <input
                  type="number"
                  name="precio"
                  className="form-control"
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="mb-3 col">
                <label className="form-label">Precio con Descuento</label>
                <input
                  type="number"
                  name="precio_descuento"
                  className="form-control"
                  onChange={handleChange}
                  required
                />
              </div>
            </div>
            <div className="mb-3">
              <div className="d-flex justify-content-center">
                <div className="w-75">
                  <label className="form-label">Categoría</label>
                  <input
                    type="text"
                    name="categoria"
                    className="form-control "
                    onChange={handleChange}
                    required
                  />
                </div>
              </div>
            </div>
            <div className=" row ">
              <div className="mb-3">
                <label className="form-label">URL</label>
                <input
                  type="url"
                  name="url"
                  className="form-control"
                  onChange={handleChange}
                  required
                />
              </div>
            </div>

            <div className="mb-3">
              <label className="form-label">Descripción</label>
              <textarea
                name="descripcion"
                className="form-control"
                onChange={handleChange}
                required
              ></textarea>
            </div>
            <div className="d-flex  justify-content-center mt-3 ">
              <div className="d-flex flex-column">
                <button type="submit" className="btn btn-secondary w-100 my-3">
                  Crear Producto
                </button>
                {info && (
                  <p
                    className={
                      info == "Producto creado Correctamente"
                        ? "text-success"
                        : "text-danger"
                    }
                  >
                    {info}
                  </p>
                )}
              </div>
            </div>
          </form>
        </>
      ) : (
        <>
          <div className="d-flex justify-content-center my-5">
            <div className="spinner-border text-primary" role="status">
              <span className="visually-hidden">Cargando...</span>
            </div>
          </div>
        </>
      )}
    </div>
  );
};

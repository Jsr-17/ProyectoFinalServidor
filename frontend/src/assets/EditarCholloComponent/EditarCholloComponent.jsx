import React, { useEffect, useState } from "react";
import { CholloService } from "../../api/services/CholloService";

export const EditarCholloComponent = () => {
  const { obtenerChollo, actualizarChollo } = CholloService();
  const [loading, setLoading] = useState(false);
  const [info, setInfo] = useState("");
  const [formData, setFormData] = useState({
    titulo: "",
    puntuacion: "",
    precio: "",
    precio_descuento: "",
    categoria: "",
    url: "",
    descripcion: "",
  });
  const id = sessionStorage.getItem("id");

  useEffect(() => {
    const obtenerDatos = async () => {
      setLoading(true);
      try {
        const datos = await obtenerChollo(id);
        setFormData(datos.data.message || {});
      } catch {
        setInfo("Error al obtener los datos del chollo");
      } finally {
        setLoading(false);
      }
    };

    obtenerDatos();
  }, []);

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    try {
      await actualizarChollo(formData);
      setInfo("Producto modificado correctamente");
    } catch {
      setInfo("Error al modificar el producto");
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="container mt-4">
      {!loading ? (
        <>
          <h2 className="text-center my-5">Modificar Chollo</h2>
          <form onSubmit={handleSubmit} className="card p-4 shadow-lg">
            <div className="row row-cols-sm-1 row-cols-md-2">
              <div className="mb-3 col">
                <label className="form-label">Título</label>
                <input
                  type="text"
                  name="titulo"
                  className="form-control"
                  onChange={handleChange}
                  required
                  value={formData.titulo}
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
                  value={formData.puntuacion}
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
                  value={formData.precio}
                />
              </div>
              <div className="mb-3 col">
                <label className="form-label">Precio con Descuento</label>
                <input
                  type="number"
                  name="precio_descuento"
                  className="form-control"
                  onChange={handleChange}
                  value={formData.precio_descuento}
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
                    className="form-control"
                    onChange={handleChange}
                    value={formData.categoria}
                    required
                  />
                </div>
              </div>
            </div>
            <div className="row">
              <div className="mb-3">
                <label className="form-label">URL</label>
                <input
                  type="url"
                  name="url"
                  className="form-control"
                  onChange={handleChange}
                  value={formData.url}
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
                value={formData.descripcion}
              ></textarea>
            </div>
            <div className="d-flex justify-content-center mt-3">
              <div className="d-flex flex-column">
                <button type="submit" className="btn btn-secondary w-100 my-3">
                  Modificar Producto
                </button>
                {info && (
                  <p
                    className={
                      info.includes("Correctamente")
                        ? "text-danger"
                        : "text-success"
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
        <div className="d-flex justify-content-center my-5">
          <div className="spinner-border text-primary" role="status">
            <span className="visually-hidden">Cargando...</span>
          </div>
        </div>
      )}
    </div>
  );
};

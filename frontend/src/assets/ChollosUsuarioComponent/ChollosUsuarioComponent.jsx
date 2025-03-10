import React, { useEffect, useState } from "react";
import { UsuarioCholloService } from "../../api/services/UsuarioCholloService";
import { CholloComponent } from "../CholloComponent/CholloComponent";

export const ChollosUsuarioComponent = () => {
  const { obtenerChollosUsuario } = UsuarioCholloService();
  const [chollos, setChollos] = useState([]);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    const data = async () => {
      setLoading(true);
      try {
        const datos = await obtenerChollosUsuario(
          sessionStorage.getItem("usuario_id")
        );
        setChollos(datos.data);
      } catch (err) {
        console.log(err);
      } finally {
        setLoading(false);
      }
    };
    data();
  }, []);

  return (
    <div className="container text-center my-5">
      <div className="jumbotron bg-light p-5 shadow-sm rounded">
        <h1 className="display-4">Estos Son Tus Chollos!!!</h1>
        <p className="lead">
          Encuentra las mejores ofertas y descuentos en una gran variedad de
          productos.
        </p>
        <hr className="my-4" />
        <p>Explora nuestras categorías y descubre productos increíbles.</p>
      </div>

      <div className="row mt-5">
        <div className="col-md-4">
          <div className="card shadow-sm">
            <div className="card-body">
              <h5 className="card-title">Ofertas exclusivas</h5>
              <p className="card-text">
                Aprovecha descuentos especiales en productos seleccionados.
              </p>
            </div>
          </div>
        </div>
        <div className="col-md-4">
          <div className="card shadow-sm">
            <div className="card-body">
              <h5 className="card-title">Nuevas tendencias</h5>
              <p className="card-text">
                Descubre los productos más populares del momento.
              </p>
            </div>
          </div>
        </div>
        <div className="col-md-4">
          <div className="card shadow-sm">
            <div className="card-body">
              <h5 className="card-title">Atención al cliente</h5>
              <p className="card-text">
                Estamos aquí para ayudarte con cualquier duda o consulta.
              </p>
            </div>
          </div>
        </div>
        <div className="container-fluid mt-3">
          {loading && (
            <div className="d-flex justify-content-center my-2">
              <div className="spinner-border" role="status">
                <span className="visually-hidden">Cargando...</span>
              </div>
            </div>
          )}
          <div className="row row-cols-sm-1 row-cols-md-3 ">
            {loading ? (
              <></>
            ) : chollos.length > 0 ? (
              chollos.map((el) => <CholloComponent key={el.id} {...el} />)
            ) : (
              <div className="d-flex align-items-center justify-content-center">
                <p className="text-muted fs-5">No hay Chollos</p>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
};

import { useInicio } from "../../hooks/useInicio";
import { CholloComponent } from "../CholloComponent/CholloComponent";

export const InicioComponent = () => {
  const { ChollosVentas, compraChollo, editarChollo, loading } = useInicio();

  return (
    <div className="container text-center my-5">
      <div className="jumbotron bg-light p-5 shadow-sm rounded">
        <h1 className="display-4">Bienvenido a ChollosVentas</h1>
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
          <div className="row row-cols-sm-1 row-cols-md-3">
            {ChollosVentas.map((el) => (
              <CholloComponent
                key={el.id}
                {...el}
                compraChollo={compraChollo}
                editarChollo={editarChollo}
              />
            ))}
          </div>
        </div>
      </div>
    </div>
  );
};

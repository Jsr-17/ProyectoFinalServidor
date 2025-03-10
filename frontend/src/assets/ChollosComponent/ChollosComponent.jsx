import React from "react";

export const ChollosComponent = () => {
  return (
    <div className="container my-4">
      <h2 className="text-center mb-4">Lista de Productos</h2>

      <div className="row">
        <div className="col-md-4">
          <div className="card shadow-sm mb-4">
            <div className="card-body ">
              <h5 className="card-title  my-3">Título del Producto</h5>
              <p className="card-text  my-3">Descripción breve del producto.</p>
              <p className="text-muted  my-3">
                Categoría: <span className="fw-bold">Ejemplo</span>
              </p>
              <p className="text-warning  my-3 ">Puntuación: ★★★★☆</p>
              <p className="text-danger  my-3">
                <del>$XXX</del> <span className="text-success">$XXX</span>
              </p>
              <p className="text-muted  my-3">
                Disponibilidad: <span className="fw-bold">En stock</span>
              </p>
              <button className="btn btn-secondary w-100 my-3">
                Ver detalles
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

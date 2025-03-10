import React from "react";
import { Link } from "react-router-dom";

export const CholloComponent = ({
  id,
  categoria,
  descripcion,
  disponible,
  precio,
  precio_descuento,
  puntuacion,
  titulo,
  compraChollo,
  editarChollo,
}) => {
  return (
    <div className="container d-flex justify-content-center my-4">
      <div
        className="card shadow-lg"
        style={{ width: "100%", maxWidth: "500px" }}
      >
        <img
          src="https://via.placeholder.com/400"
          className="card-img-top"
          alt="Imagen del Producto"
        />
        <div className="card-body">
          <h4 className="card-title fw-bold  my-3">{titulo}</h4>
          <p className="card-text text-muted ">{descripcion}</p>

          <p className=" my-3">
            <strong>Categoría:</strong> {categoria}
          </p>

          <p className=" my-3">
            <strong>Puntuación:</strong> ⭐{puntuacion}
          </p>

          <p className=" my-3">
            <strong>Precio:</strong>
            <span className="text-decoration-line-through text-danger mx-1 ">
              {precio}
            </span>
            <span className="text-success fw-bold  my-3">
              {precio_descuento}
            </span>
          </p>

          <p className="mb-2 text-success  my-3">
            <strong>Disponibilidad:</strong>{" "}
            {disponible ? "En stock" : "Fuera de Stock"}
          </p>
          <div className="my-2">
            <a
              href="#"
              className="btn btn-secondary w-25  m-3 text-nowrap px-1"
              onClick={() => compraChollo(id)}
            >
              Comprar
            </a>
            <Link
              to={"/edit"}
              className="btn btn-secondary w-25 m-3 text-nowrap px-1"
              onClick={() => editarChollo(id)}
            >
              Editar
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
};

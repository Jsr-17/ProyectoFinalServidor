import React from "react";
import { api } from "../api";

export const CholloService = () => {
  const obtenerChollos = async () => api.get("/chollo");
  const obtenerChollo = async (id) => api.get(`/chollo/${id}`);
  const crearChollo = async (chollo) => api.post("/chollo", chollo);
  const actualizarChollo = async (chollo) => api.put("/chollo", chollo);
  const eliminarChollo = async (id) => api.delete(`/chollo/${id}`);
  return {
    obtenerChollos,
    obtenerChollo,
    crearChollo,
    eliminarChollo,
    actualizarChollo,
  };
};

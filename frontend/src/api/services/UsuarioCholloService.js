import React from "react";
import { api } from "../api";

export const UsuarioCholloService = () => {
  const obtenerChollosUsuario = (user) =>
    api.get(`/usuario-chollo/${user}/chollos`);
  const obtenerUsuariosDeChollo = (chollo) =>
    api.get(`/usuario-chollo/chollo/${chollo}/usuarios`);
  const agregarCholloAlUsuario = (usuario, chollo) =>
    api.post(`/usuario-chollo/${usuario}/agregar/${chollo}`);
  const eliminarCholloDelUsuario = (usuario, chollo) =>
    api.delete(`/usuario-chollo/${usuario}/eliminar/${chollo}`);

  return {
    obtenerChollosUsuario,
    obtenerUsuariosDeChollo,
    agregarCholloAlUsuario,
    eliminarCholloDelUsuario,
  };
};

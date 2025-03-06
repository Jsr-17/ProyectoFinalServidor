import React from "react";
import { api } from "../api";

export const UsuarioService = () => {
  const obtenerUsuarios = async () => await api.get("/usuario");
  const obtenerUsuario = async (id) => await api.get(`/usuario/${id}`);
  const crearUsuario = async (usuario) => await api.post("/usuario", usuario);
  const modificarUsuario = async (usuario) =>
    await api.put("/usuario", usuario);
  const eliminarUsuario = async (id) => await api.delete(`/usuario/${id}`);

  return {
    eliminarUsuario,
    obtenerUsuarios,
    obtenerUsuario,
    crearUsuario,
    modificarUsuario,
  };
};

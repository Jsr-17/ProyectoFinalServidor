import React from "react";
import { api } from "../api";

export const ComentarioService = () => {
  const obtenerComentariosUsuario = async (id) =>
    api.get(`/comentariosUsuario/${id}`);
  const obtenerComentariosChollo = async (id) =>
    api.get(`/comentariosChollo/${id}`);
  const crearComentario = async () => api.post(`/comentario`);
  const obtenerTodosComentarios = async () => api.get("/comentario");
  return {
    obtenerComentariosUsuario,
    crearComentario,
    obtenerComentariosChollo,
    obtenerTodosComentarios,
  };
};

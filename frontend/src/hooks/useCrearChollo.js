import React, { useState } from "react";
import { CholloService } from "../api/services/CholloService";

export const useCrearChollo = () => {
  const { crearChollo } = CholloService();
  const [loading, setLoading] = useState(false);
  const [info, setInfo] = useState("");

  const [formData, setFormData] = useState({
    titulo: "",
    descripcion: "",
    url: "",
    categoria: "",
    puntuacion: "",
    precio: "",
    precio_descuento: "",
    disponible: true,
  });

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
      await crearChollo(formData);
      setInfo("Producto creado Correctamente");
    } catch {
      setInfo("Ese chollo ya existe");
    } finally {
      setLoading(false);
    }
  };
  return { handleChange, handleSubmit, loading, info };
};

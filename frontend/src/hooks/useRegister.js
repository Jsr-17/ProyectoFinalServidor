import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { UsuarioService } from "../api/services/UsuarioService";

export const useRegister = () => {
  const navigate = useNavigate();

  const { crearUsuario } = UsuarioService();
  const [formData, setFormData] = useState({});
  const [fail, setFail] = useState("");
  const [loading, setLoading] = useState(false);

  const handleOnChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setFail("");
    setLoading(true);
    try {
      const response = await crearUsuario(formData);
      sessionStorage.setItem("usuario_id", response.data.usuario.id);
      navigate("/inicio");
    } catch ({ response }) {
      setFail(response.data.message);
    } finally {
      setLoading(false);
    }
  };
  return {
    fail,
    loading,
    handleOnChange,
    handleSubmit,
  };
};

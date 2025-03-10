import React, { useEffect, useState } from "react";
import { CholloService } from "../api/services/CholloService";
import { UsuarioCholloService } from "../api/services/UsuarioCholloService";

export const useInicio = () => {
  const { obtenerChollos } = CholloService();
  const { agregarCholloAlUsuario } = UsuarioCholloService();
  const [ChollosVentas, setChollosVentas] = useState([]);
  const [loading, setLoading] = useState(false);

  const compraChollo = (e) => {
    const userid = sessionStorage.getItem("usuario_id");
    agregarCholloAlUsuario(userid, e);
  };

  const editarChollo = (e) => {
    sessionStorage.setItem("id", e);
  };

  const handleObtenerChollos = async () => {
    try {
      setLoading(true);
      const response = await obtenerChollos();
      const {
        data: { message },
      } = response;
      setChollosVentas(message);
    } catch (err) {
      console.log(err);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    handleObtenerChollos();
  }, []);

  return {
    compraChollo,
    editarChollo,
    ChollosVentas,
    loading,
  };
};

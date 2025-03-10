import React, { useEffect, useState } from "react";

export const useNavBar = () => {
  const [usuario, setUsuario] = useState(sessionStorage.getItem("usuario_id"));

  useEffect(() => {
    const obtenerUsuario = () => {
      const usuarioId = sessionStorage.getItem("usuario_id");
      setUsuario(usuarioId);
    };

    obtenerUsuario();

    const interval = setInterval(obtenerUsuario, 1000);

    return () => clearInterval(interval);
  }, []);

  const cerrarSesion = () => {
    sessionStorage.removeItem("usuario_id");
    setUsuario(null);
  };

  return { cerrarSesion, usuario };
};

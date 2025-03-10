import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { LoginService } from "../api/services/LoginService";

export const useLogin = () => {
  const navigate = useNavigate();

  const { login } = LoginService();

  const [email, setEmail] = useState("jarmoreno5@gmail.com");
  const [pass, setPass] = useState("12345678");
  const [errorMessage, setErrorMessage] = useState("");
  const [loading, setLoading] = useState(false);

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setErrorMessage("");
    try {
      const response = await login({ email, pass });
      sessionStorage.setItem("usuario_id", response.data.id);
      navigate("/inicio");
    } catch (err) {
      setErrorMessage(err.response.data.message);
    } finally {
      setLoading(false);
    }
  };

  return {
    setEmail,
    setPass,
    email,
    pass,
    errorMessage,
    loading,
    handleSubmit,
  };
};

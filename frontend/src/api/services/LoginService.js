import React from "react";
import { api } from "../api";

export const LoginService = () => {
  const login = (datos) => api.post("/login", datos);
  return { login };
};

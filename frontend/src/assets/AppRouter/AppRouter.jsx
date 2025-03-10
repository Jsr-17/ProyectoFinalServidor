import { Route, Routes } from "react-router-dom";
import React from "react";
import { ChollosComponent } from "../ChollosComponent/ChollosComponent";
import { InicioComponent } from "../InicioComponent/InicioComponent";
import { LoginComponent } from "../LoginComponent/LoginComponent";
import { RegisterComponent } from "../RegisterComponent/RegisterComponent";
import { CrearCholloComponent } from "../CrearCholloComponent/CrearCholloComponent";
import { EditarCholloComponent } from "../EditarCholloComponent/EditarCholloComponent";
import { ChollosUsuarioComponent } from "../ChollosUsuarioComponent/ChollosUsuarioComponent";

export const AppRouter = () => {
  return (
    <Routes>
      <Route path="/crearChollo" element={<CrearCholloComponent />} />
      <Route path="/edit" element={<EditarCholloComponent />} />

      <Route path="/chollos" element={<ChollosComponent />} />
      <Route path="/inicio" element={<InicioComponent />} />
      <Route path="/login" element={<LoginComponent />} />
      <Route path="/register" element={<RegisterComponent />} />
      <Route path="/misChollos" element={<ChollosUsuarioComponent />} />
    </Routes>
  );
};

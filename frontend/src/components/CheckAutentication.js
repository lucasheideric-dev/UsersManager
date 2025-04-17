import { Navigate, Outlet } from "react-router-dom";

const CheckAutentication = () => {
  const token = sessionStorage.getItem("token");

  if (!token) {
    return <Navigate to="/login" replace />;
  }

  return <Outlet />;
};

export default CheckAutentication;

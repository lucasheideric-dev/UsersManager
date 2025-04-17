import {
  BrowserRouter,
  Routes,
  Route,
  Navigate,
  useLocation,
} from "react-router-dom";

import CheckAutentication from "./components/CheckAutentication";
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import UserForm from "./components/UserForm";
import SessionProgressBar from "./components/SessionProgressBar";

import Login from "./pages/Login";
import Users from "./pages/Users";
import NotFound from "./pages/NotFound";

import useTokenValidator from "./hooks/useTokenValidator";

import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

function App() {
  return (
    <BrowserRouter>
      <ToastContainer />
      <AppContent />
    </BrowserRouter>
  );
}

const AppContent = () => {
  const location = useLocation();
  const isLoginPage = location.pathname === "/login";
  const isNotFoundPage = location.pathname === "/404";

  useTokenValidator();

  return (
    <div className="min-h-screen bg-slate-50 flex flex-col">
      {!isLoginPage && !isNotFoundPage && (
        <SessionProgressBar
          key={`session-bar-${location.pathname}`}
          interval={30000}
        />
      )}

      {!isLoginPage && !isNotFoundPage && <Navbar />}

      <main className="flex-grow">
        <Routes>
          <Route path="/login" element={<Login />} />

          <Route element={<CheckAutentication />}>
            <Route path="/" element={<Navigate to="/users" />} />

            <Route path="/users" element={<Users />} />
            <Route path="/users/add" element={<UserForm />} />
            <Route path="/users/edit/:id" element={<UserForm />} />

            <Route path="*" element={<Navigate to="/404" replace />} />
          </Route>

          <Route path="/404" element={<NotFound />} />
        </Routes>
      </main>

      {!isLoginPage && !isNotFoundPage && <Footer />}
    </div>
  );
};

export default App;

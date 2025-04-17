import React, { useState, useEffect } from "react";

const UserForm = ({ id, onClose }) => {
  const isEditMode = !!id;
  const [formData, setFormData] = useState({
    name: "",
    last_name: "",
    email: "",
    password: "",
  });
  const [error, setError] = useState("");
  const token = sessionStorage.getItem("token");

  useEffect(() => {
    if (isEditMode) {
      fetch(`http://127.0.0.1:8000/api/users/view/${id}`, {
        headers: { Authorization: `Bearer ${token}` },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.user) {
            setFormData({
              name: data.user.name || "",
              last_name: data.user.last_name || "",
              email: data.user.email || "",
              password: "",
            });
          } else {
            setError("Usuário não encontrado.");
          }
        });
    }
  }, [id]);

  const handleChange = (e) => {
    setFormData((prev) => ({
      ...prev,
      [e.target.name]: e.target.value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    const method = isEditMode ? "PUT" : "POST";
    const url = isEditMode
      ? `http://127.0.0.1:8000/api/users/edit/${id}`
      : `http://127.0.0.1:8000/api/users/add`;

    const payload = { ...formData };
    if (isEditMode && !formData.password) {
      delete payload.password;
    }

    const response = await fetch(url, {
      method,
      headers: {
        Authorization: `Bearer ${token}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    });

    const data = await response.json();
    if (response.ok) onClose();
    else setError(data.error || "Erro ao salvar dados.");
  };

  return (
    <div>
      <h2 className="text-xl font-bold mb-4">
        {isEditMode ? "Editar Usuário" : "Adicionar Usuário"}
      </h2>

      {error && (
        <div className="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
          {error}
        </div>
      )}

      <form onSubmit={handleSubmit} className="space-y-4">
        <input
          type="text"
          name="name"
          placeholder="Nome"
          value={formData.name}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded"
          required
        />
        <input
          type="text"
          name="last_name"
          placeholder="Sobrenome"
          value={formData.last_name}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded"
          required
        />
        <input
          type="email"
          name="email"
          placeholder="E-mail"
          value={formData.email}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded"
          required
        />
        {!isEditMode && (
          <input
            type="password"
            name="password"
            placeholder="Senha"
            value={formData.password}
            onChange={handleChange}
            className="w-full border px-4 py-2 rounded"
            required
          />
        )}
        <div className="flex justify-end gap-2">
          <button
            type="button"
            className="bg-gray-300 px-4 py-2 rounded"
            onClick={onClose}
          >
            Cancelar
          </button>
          <button
            type="submit"
            className="bg-[#00203F] text-white px-6 py-2 rounded hover:bg-[#002A51]"
          >
            {isEditMode ? "Atualizar" : "Salvar"}
          </button>
        </div>
      </form>
    </div>
  );
};

export default UserForm;

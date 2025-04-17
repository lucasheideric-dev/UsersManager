import React, { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";

import UserForm from "../components/UserForm";
import Modal from "../components/Modal";
import Table from "../components/Table";

import Swal from "sweetalert2";

const Users = () => {
  const [usuarios, setUsuarios] = useState([]);
  const [errorMessage, setErrorMessage] = useState("");
  const [loading, setLoading] = useState(true);
  const [selectedUserId, setSelectedUserId] = useState(null);
  const [modalVisible, setModalVisible] = useState(false);
  const [editMode, setEditMode] = useState(false);
  const navigate = useNavigate();

  const token = sessionStorage.getItem("token");
  const url = "http://127.0.0.1:8000/api/users";

  const fetchUserData = async () => {
    try {
      const response = await fetch(url, {
        headers: {
          Authorization: `Bearer ${token}`,
          "Content-Type": "application/json",
        },
      });

      const data = await response.json();
      if (response.ok) {
        setUsuarios(data.users || []);
      } else {
        setErrorMessage(data.error || "Erro ao carregar usuários.");
        navigate("/login");
      }
    } catch {
      setErrorMessage("Erro ao conectar-se ao servidor.");
    } finally {
      setLoading(false);
    }
  };

  const handleDelete = async (id) => {
    const result = await Swal.fire({
      title: "Tem certeza?",
      text: "Essa ação não poderá ser desfeita!",
      icon: "warning",
      showCancelButton: true,
      cancelButtonColor: "#d33",
      confirmButtonColor: "#002A51",
      confirmButtonText: "Sim, excluir!",
      cancelButtonText: "Cancelar",
      reverseButtons: true,
    });

    if (result.isConfirmed) {
      try {
        const response = await fetch(`${url}/delete/${id}`, {
          method: "DELETE",
          headers: {
            Authorization: `Bearer ${token}`,
            "Content-Type": "application/json",
          },
        });

        const data = await response.json();

        if (response.ok) {
          fetchUserData();
        } else {
          Swal.fire("Erro!", data.error || "Erro ao deletar usuário.", "error");
        }
      } catch (error) {
        Swal.fire("Erro!", "Erro ao conectar-se ao servidor.", "error");
      }
    }
  };

  const colunas = [
    { chave: "id", titulo: "ID" },
    { chave: "name", titulo: "Nome" },
    { chave: "last_name", titulo: "Sobrenome" },
    { chave: "email", titulo: "Email" },
  ];

  useEffect(() => {
    if (token) {
      fetchUserData();
    } else {
      setErrorMessage("Token não encontrado, por favor faça login.");
      setLoading(false);
    }
  }, [token]);

  const openModal = (userId = null) => {
    setSelectedUserId(userId);
    setEditMode(!!userId);
    setModalVisible(true);
  };

  const closeModal = () => {
    setModalVisible(false);
    setSelectedUserId(null);
    setEditMode(false);
    fetchUserData();
  };

  if (loading) return <div className="p-6">Carregando usuários...</div>;

  return (
    <div className="w-full h-full mt-16 px-4 py-6">
      <div className="max-w-7xl mx-auto">
        <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
          <h1 className="text-3xl md:text-4xl font-bold text-gray-800">
            Lista de Usuários
          </h1>
          <button
            onClick={() => openModal()}
            className="bg-[#002A51] hover:bg-[#00203f] text-white font-semibold px-5 py-2 rounded-lg shadow-md transition duration-300"
          >
            + Adicionar Usuário
          </button>
        </div>

        {errorMessage && (
          <div className="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 shadow">
            {errorMessage}
          </div>
        )}

        <div className="bg-white rounded-sm shadow overflow-x-auto">
          <Table
            colunas={colunas}
            dados={usuarios}
            chaveUnica="id"
            ordenacaoInicial={{ coluna: "id", ordem: "asc" }}
            onEditar={openModal}
            onExcluir={handleDelete}
          />
        </div>
      </div>

      {modalVisible && (
        <Modal onClose={closeModal}>
          <UserForm id={selectedUserId} onClose={closeModal} />
        </Modal>
      )}
    </div>
  );
};

export default Users;

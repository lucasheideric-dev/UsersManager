import React, { useState, useMemo } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEdit, faTrashAlt } from "@fortawesome/free-solid-svg-icons";

export default function Table({
  colunas,
  dados,
  chaveUnica,
  ordenacaoInicial,
  onEditar,
  onExcluir,
}) {
  const [busca, setBusca] = useState("");
  const [colunaOrdenada, setColunaOrdenada] = useState(
    ordenacaoInicial?.coluna || null
  );
  const [ordem, setOrdem] = useState(ordenacaoInicial?.ordem || "asc");

  const dadosFiltradosEOrdenados = useMemo(() => {
    let resultado = [...dados];

    if (busca.trim() !== "") {
      resultado = resultado.filter((item) =>
        colunas.some((coluna) =>
          String(item[coluna.chave]).toLowerCase().includes(busca.toLowerCase())
        )
      );
    }

    if (colunaOrdenada) {
      resultado.sort((a, b) => {
        const aValor = a[colunaOrdenada];
        const bValor = b[colunaOrdenada];

        if (aValor < bValor) return ordem === "asc" ? -1 : 1;
        if (aValor > bValor) return ordem === "asc" ? 1 : -1;
        return 0;
      });
    }

    return resultado;
  }, [dados, busca, colunaOrdenada, ordem, colunas]);

  const alternarOrdenacao = (chave) => {
    if (colunaOrdenada === chave) {
      setOrdem((prev) => (prev === "asc" ? "desc" : "asc"));
    } else {
      setColunaOrdenada(chave);
      setOrdem("asc");
    }
  };

  return (
    <div className="w-full">
      <div className="m-4">
        <input
          type="text"
          value={busca}
          onChange={(e) => setBusca(e.target.value)}
          placeholder="Buscar..."
          className="border px-3 py-2 rounded w-full max-w-xs"
        />
      </div>
      <table className="min-w-full divide-y divide-gray-200 text-sm">
        <thead className="bg-gray-50">
          <tr>
            {colunas.map((coluna) => (
              <th
                key={coluna.chave}
                className="px-6 py-4 text-left font-semibold text-gray-600 cursor-pointer select-none"
                onClick={() => alternarOrdenacao(coluna.chave)}
              >
                {coluna.titulo}
                {colunaOrdenada === coluna.chave && (
                  <span className="ml-1">{ordem === "asc" ? "↑" : "↓"}</span>
                )}
              </th>
            ))}
            {(onEditar || onExcluir) && (
              <th className="px-6 py-4 text-left font-semibold text-gray-600">
                Ações
              </th>
            )}
          </tr>
        </thead>
        <tbody>
          {dadosFiltradosEOrdenados.length > 0 ? (
            dadosFiltradosEOrdenados.map((item) => (
              <tr
                key={item[chaveUnica]}
                className="border-b hover:bg-gray-50 transition"
              >
                {colunas.map((coluna) => (
                  <td key={coluna.chave} className="px-6 py-4">
                    {item[coluna.chave]}
                  </td>
                ))}
                {(onEditar || onExcluir) && (
                  <td className="px-6 py-4 space-x-2">
                    {onEditar && (
                      <button
                        onClick={() => onEditar(item.id)}
                        className="bg-[#004382] hover:bg-[#002A51] text-white font-semibold px-3 py-2 rounded-lg shadow-md transition duration-300"
                        title="Editar"
                      >
                        <FontAwesomeIcon icon={faEdit} />
                      </button>
                    )}
                    {onExcluir && (
                      <button
                        onClick={() => onExcluir(item.id)}
                        className="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-2 rounded-lg shadow-md transition duration-300"
                        title="Excluir"
                      >
                        <FontAwesomeIcon icon={faTrashAlt} />
                      </button>
                    )}
                  </td>
                )}
              </tr>
            ))
          ) : (
            <tr>
              <td
                colSpan={colunas.length + 1}
                className="text-center py-4 text-gray-500"
              >
                Nenhum dado encontrado.
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
}

import axios from 'axios';

const API_URL = 'http://127.0.0.1:8765/api/roles';

export const getRoles = async () => {
    const token = localStorage.getItem('token');

    if (!token) {
        throw new Error('Token não encontrado');
    }

    try {
        const response = await axios.get(API_URL, {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });
        return response.data;
    } catch (error) {
        console.error('Erro ao obter roles:', error);
        throw error;
    }
};

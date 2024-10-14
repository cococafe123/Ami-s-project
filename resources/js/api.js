import axios from "axios";

export const getCardIndex = (body) =>
    window.axios.get(`/api/cards`, { params: body });

export const putLikeCard = (id, body) =>
    window.axios.put(`/api/card/${id}`, body);

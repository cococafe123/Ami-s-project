export const getCardIndex = (body) => {
    return window.axios.get(`/api/cards`, { params: body });
};

export const putLikeCard = (id, body) => {
    return window.axios.put(`/api/card/${id}`, body);
};

import axios from 'axios'

// const api = window.axios.create({
//     baseURL: import.meta.env.APP_URL,
//     timeout: 5000,
//   });

export const getCardIndex = (body)=>window.axios.get(`/api/cards`,body)

export const putLikeCard = (id,body)=>window.axios.put(`/api/card/${id}`,body)
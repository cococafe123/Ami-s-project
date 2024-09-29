import Frame from "./Components/Frame.vue";
import BusinessCard from "./Components/BusinessCard.vue";

export const importComponents = (app) => {
    app.component("Frame", Frame);
    app.component("BusinessCard", BusinessCard);
};

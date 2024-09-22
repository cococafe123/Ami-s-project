import NavBar from "./Components/NavBar.vue";
import Footer from "./Components/Footer.vue";
import Frame from "./Components/Frame.vue";
import Input from "./Components/Input.vue";
import ProductSection from "./Components/ProductSection.vue";
import Pagintation from "./Components/Pagintation.vue";

export const importGlobalComponents = (app) => {
    app.component("NavBar", NavBar);
    app.component("Footer", Footer);
    app.component("Frame", Frame);
    app.component("Input", Input);
    app.component("ProductSection", ProductSection);
    app.component("Pagintation", Pagintation);
};

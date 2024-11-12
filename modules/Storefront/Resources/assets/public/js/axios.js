import axios from "axios";

window.axios = axios;

axios.defaults.headers.common["X-CSRF-TOKEN"] = NiceShop.csrfToken;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

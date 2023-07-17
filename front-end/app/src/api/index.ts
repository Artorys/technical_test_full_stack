import axios from "axios";

export const apiAppliance = axios.create({baseURL : "http://localhost/api/appliance/"})

import http from "./http";

class DataService {
  getAll() {
    return http.get("/entry");
  }

  create(data) {
    return http.post("/entry", data);
  }

  update(id) {
    return http.put(`/entry/${id}`);
  }

  delete(id) {
    return http.delete(`/entry/${id}`);
  }

}

export default new DataService();
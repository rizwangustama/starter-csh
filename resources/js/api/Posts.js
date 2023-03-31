import httpClient from './httpClient';
import axios from 'axios';

export default class Posts {
  static getLocations(formData) {
    return httpClient.post('/locations/zip', formData);
  }
  
  static getIdByLocation(formData) {
    return httpClient.post('/locations/name', formData);
  }

  static doAction(formData) {
    return axios.post(SETTINGS.ajax_url, formData);
  }

  static getProductManufacture(formData) {
    return httpClient.post('/manufacture/product', formData);
  }

  static getManufacture(formData) {
    return httpClient.post('/manufacture/brand', formData);
  }

  static getNavigationPage(formData) {
    return httpClient.post('/pages/navigation', formData);
  }

  static getAllBlogs(formData) {
    return httpClient.post('/blogs/all', formData);
  }
}

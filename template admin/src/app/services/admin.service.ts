import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class AdminService {

  private _adminAllProductsUrl = "http://127.0.0.1:8000/adminproduits";

  constructor(private http: HttpClient) { }

  getAllProducts() {
    return this.http.get<any>(this._adminAllProductsUrl);
  }

  
}
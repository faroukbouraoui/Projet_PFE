import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { Observable } from 'rxjs';
import { Category } from '../shared/Category';
import { environment } from 'src/environments/environment';
import { Product } from '../shared/Product';
import { Fournisseur } from '../shared/Fournisseur';
import { Commande } from '../shared/Commande';
@Injectable({
  providedIn: 'root'
})
export class AllService {

  constructor(private http: HttpClient) { }

  getAllCategories(): Observable<Category[]> {
    return this.http.get<Category[]>(environment.BACK_END_URL + '/categories').pipe(
    );
  }

  getAllProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(environment.BACK_END_URL + '/produits').pipe();
  }

  getProductsByCategory(id: number): Observable<Product[]> {
    return this.http.get<Product[]>(environment.BACK_END_URL + '/getproduits_categorie/' + id).pipe();
  }

  getAllFournisseurs(): Observable<Fournisseur[]> {
    return this.http.get<Fournisseur[]>(environment.BACK_END_URL + '/fournisseur').pipe();
  }

  getProductsByFournisseur(id: number): Observable<Product[]> {
    return this.http.post<Product[]>(environment.BACK_END_URL + '/getproduits_fournisseur', { 'id': id }).pipe();
  }

  getFournisseurByProduct(id: number): Observable<Fournisseur> {
    return this.http.get<Fournisseur>(environment.BACK_END_URL+'/getfournisseur_produits/'+id).pipe();
  }

  getCategoryByProduct(id: number) : Observable<Category> {
    return this.http.get<Category>(environment.BACK_END_URL+'/getcategorie_produits/'+id).pipe();
  }

  getAllCommandes(): Observable<Commande[]> {
    return this.http.get<Commande[]>(environment.BACK_END_URL+'/commandes').pipe();
  }

  getProductsByCommande(id: number) : Observable<Product[]> {
    return this.http.get<Product[]>(environment.BACK_END_URL+'/getproduits_commande/'+id).pipe();
  }

}

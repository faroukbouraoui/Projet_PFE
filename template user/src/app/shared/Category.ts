import { Product } from './Product';

export interface Category {
    id : number;
    nom_categorie: string;
    produit : Product[];
}
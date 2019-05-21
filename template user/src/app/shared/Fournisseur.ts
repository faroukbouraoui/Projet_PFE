import { Product } from './Product';

export interface Fournisseur {
    id: number;
    nom_fournisseur: string;
    adresse_fournisseur: string;
    num_tel_fournisseur: string;
    produit: Product[];
}